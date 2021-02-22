<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\ReportStatus;
use App\Models\ReportItemFile;
use App\Models\Tag;
use App\Models\WorkAssignment;
use App\Models\WorkReport;
use App\Models\ReportCm;
use Carbon\Carbon;
use DateTime;
use Auth;
use DB;
use League\CommonMark\Block\Element\Document;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->type==0){


            $date_time = new DateTime();
            $datetime_pattern = $date_time->format('Y-m-d');
            $end_date =  new DateTime($datetime_pattern.' 20:00:00');
            $start_date = new DateTime($datetime_pattern.' 07:00:00');
            $request_user_id = 0;
            $request_status = 0;

            if($user->team == 0){
                $user = User::where('type',1)->get();
            }
            else{
                $user = User::where('type',1)->where('team',$user->team)->get();
            }
            
            $array_user_id = [];
            foreach($user as $userfind){
                array_push($array_user_id,$userfind->id);
            }

            
            $status = ReportStatus::get();
            $report = Report::whereIn('visible',[2,3,4])->whereIn('name_id',$array_user_id)
                                                ->whereBetween('timestamp',[$start_date,$end_date])
                                                ->orderby('timestamp','desc')
                                                ->get();

            $fileName = ReportItemFile::where('visible',1)->get();
            return view('DailyReport.admin.index')->with('report',$report)
                                            ->with('user',$user)
                                            ->with('status',$status)
                                            ->with('fileName',$fileName)
                                            ->with('request_user_id',$request_user_id)
                                            ->with('request_status',$request_status)
                                            ->with('start_date',$start_date->format('Y-m-d H:i'))
                                            ->with('end_date',$end_date->format('Y-m-d H:i'));


       
            }
        else{
            return view('home');
        }

    }


    public function indexfind(Request $request)
    {
        // return dd($request);

        $user = Auth::user();
        if($user->type == 0){

            $start_date =  new Datetime(str_replace('/', '-', $request['start_date'] ));
            $end_date =  new Datetime(str_replace('/', '-', $request['end_date'] ));
            $request_user_id = $request->user_id;
            $request_status = $request->status;

            if($user->team == 0){
                $user = User::where('type',1)->get();
            }
            else{
                $user = User::where('type',1)->where('team',$user->team)->get();
            }
            $array_user_id = [];
            foreach($user as $userfind){
                array_push($array_user_id,$userfind->id);
            }

            $UserID = $request->user_id;
            if($request->user_id == 0){
                $userid = $array_user_id;
            }
            else{
                $userid =  [$request->user_id];
            }

            $status = ReportStatus::get();
            if($request->status == "0"){
                $report = Report::whereIn('visible',[2,3,4])->whereIn('name_id',$userid)
                                                ->whereBetween('timestamp',[$start_date,$end_date])
                                                ->orderby('timestamp','desc')
                                                ->get();
            }
                
            else{
                $report = Report::whereIn('visible',[2,3,4])->where('Work_status',$request->status)
                                                ->whereIn('name_id',$userid)
                                                ->whereBetween('timestamp',[$start_date,$end_date])
                                                ->orderby('timestamp','desc')
                                                ->get();
            }

            $fileName = ReportItemFile::where('visible',1)->get();
            return view('DailyReport.admin.index')->with('report',$report)
                                            ->with('user',$user)
                                            ->with('UserID',$UserID)
                                            ->with('status',$status)
                                            ->with('fileName',$fileName)
                                            ->with('request_user_id',$request_user_id)
                                            ->with('request_status',$request_status)
                                            ->with('start_date',$start_date->format('Y-m-d H:i'))
                                            ->with('end_date',$end_date->format('Y-m-d H:i'));
       
            }
        else{
            return view('home');
        }

    }

    public function reportview($id)
    {
        $myid = Auth::user();
        $report = Report::where('id',$id)->first();
        $user = User::where('id',$report->name_id)->first();
        $file = ReportItemFile::where('id',$report->name_id)->get();
        $comments = ReportCm::where('report_id',$id)->get();
        $fileName = ReportItemFile::where('report_id',$id)->where('visible',1)->get();
        
        if($myid->type == 0){
            return view('DailyReport.admin.readreport')->with('report',$report)
                                            ->with('user',$user)
                                            ->with('file',$file)
                                            ->with('comments',$comments)
                                            ->with('fileName',$fileName);
        }
        else{
            return view('DailyReport.user.readreport')->with('report',$report)
                                            ->with('user',$user)
                                            ->with('file',$file)
                                            ->with('comments',$comments)
                                            ->with('fileName',$fileName);
        }
        
    }







    

    public function userreport()
    {
        $usertype = Auth::user()->type;
        if($usertype==0){

            $report = Report::where('visible',2)->orderby('timestamp','desc')->get();
            $fileName = ReportItemFile::where('visible',1)->get();
            $user = User::where('type',1)->get();


            return view('DailyReport.reportbyusers')->with(['report'=>$report,'fileName'=>$fileName,'user'=>$user]);

        }
        else{
            return view('home');
        }

    }

    public function resentReport()
    {
        $usertype = Auth::user()->type;
        if($usertype==0){

            $rejectReport = Report::where('visible',3)->orderby('workDate','desc')->get();
            $rejectCount = Report::where('visible',3)->orderby('workDate','desc')->count();
            $resentReport = Report::where('visible',4)->orderby('workDate','desc')->get();
            $resentCount = Report::where('visible',4)->orderby('workDate','desc')->count();
            $fileName = ReportItemFile::where('visible',1)->get();
            return view('DailyReport.admin.resentReport')->with(['rejectReport'=>$rejectReport,'rejectCount'=>$rejectCount,'fileName'=>$fileName,'resentReport'=>$resentReport,'resentCount'=>$resentCount]);

        }
        else{
            return view('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myid = Auth::user()->id;
        $usertype = Auth::user()->type;
        if($usertype==1){
            $report = Report::where('visible',1)->orderby('workDate','desc')->get();
            $work_tags = WorkAssignment::where('user_id',$myid)->get();
            return view('DailyReport.user.create')->with('report',$report)
                                             ->with('work_tags',$work_tags);
        }

        else{
          $pendingCount = Report::where('visible',2)->where('status',"pending")->orderby('workDate','desc')->count();
          $rejectCount = Report::where('visible',3)->where('status',"reject")->orderby('workDate','desc')->count();
          $sentCount = Report::where('visible',4)->where('status',"resent")->orderby('workDate','desc')->count();
          $reportCount = Report::where('visible',2)->orderby('workDate','desc')->count();
          return view('admin.dashboard')->with('pendingCount',$pendingCount)
                                        ->with('rejectCount',$rejectCount)
                                        ->with('sentCount',$sentCount)
                                        ->with('reportCount',$reportCount);
        }
    }


    public function draft()
    {
        $myid = Auth::user()->id;
        $usertype = Auth::user()->type;

        if($usertype == 1){
            $report = Report::where('name_id',$myid)->where('visible',1)->orderby('workDate','desc')->get();
            $fileName = ReportItemFile::where('visible',1)->get();

            return view('DailyReport.user.draft')->with(['user' => User::findOrFail($myid),'report'=> $report,'fileName'=>$fileName]);
        }
        else{
          $pendingCount = Report::where('visible',2)->where('status',"pending")->orderby('workDate','desc')->count();
          $rejectCount = Report::where('visible',3)->where('status',"reject")->orderby('workDate','desc')->count();
          $sentCount = Report::where('visible',4)->where('status',"resent")->orderby('workDate','desc')->count();
          $reportCount = Report::where('visible',2)->orderby('workDate','desc')->count();
          return view('admin.dashboard')->with('pendingCount',$pendingCount)
                                        ->with('rejectCount',$rejectCount)
                                        ->with('sentCount',$sentCount)
                                        ->with('reportCount',$reportCount);
        }
    }


    public function rejectReport()
    {
        $myid = Auth::user()->id;
        $usertype = Auth::user()->type;

        if($usertype == 1){
            $report = Report::where('name_id',$myid)->where('visible',3)->orderby('workDate','desc')->get();
            $fileName = ReportItemFile::where('visible',1)->get();
            return view('DailyReport.rejectReport')->with(['user' => User::findOrFail($myid),'report'=> $report,'fileName'=>$fileName]);
        }
        else{
          $pendingCount = Report::where('visible',2)->where('status',"pending")->orderby('workDate','desc')->count();
          $rejectCount = Report::where('visible',3)->where('status',"reject")->orderby('workDate','desc')->count();
          $sentCount = Report::where('visible',4)->where('status',"resent")->orderby('workDate','desc')->count();
          $reportCount = Report::where('visible',2)->orderby('workDate','desc')->count();
          return view('admin.dashboard')->with('pendingCount',$pendingCount)
                                        ->with('rejectCount',$rejectCount)
                                        ->with('sentCount',$sentCount)
                                        ->with('reportCount',$reportCount);
        }
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

      $report = new Report();
      $report->name_id = $request['id'];
      $report->Work_type = $request['Work_type'];
      $report->workDate = $request['WorkDate'];
      $report->Work1 = $request['Work1'];
      $report->Work2 = $request['Work2'];
      $report->Work3 = $request['Work3'];
      $report->Work4 = $request['Work4'];
      $report->Work5 = $request['Work5'];
      $report->Work6 = $request['Work6'];
      $report->Work7 = $request['Work7'];
      $report->Work8 = $request['Work8'];
      $report->Work9 = $request['Work9'];
      $report->Work10 = $request['Work10'];
      $report->Work11 = $request['Work11'];
      $report->Work12 = $request['Work12'];
      $report->Work13 = $request['Work13'];
      $report->Work14 = $request['Work14'];
      $report->Work15 = $request['Work15'];
      $report->Work_status = $request['Work_status'];
      $report->W1_time_start = $request['W1_time_start'];
      $report->W2_time_start = $request['W2_time_start'];
      $report->W3_time_start = $request['W3_time_start'];
      $report->W4_time_start = $request['W4_time_start'];
      $report->W5_time_start = $request['W5_time_start'];
      $report->W6_time_start = $request['W6_time_start'];
      $report->W7_time_start = $request['W7_time_start'];
      $report->W8_time_start = $request['W8_time_start'];
      $report->W9_time_start = $request['W9_time_start'];
      $report->W10_time_start = $request['W10_time_start'];
      $report->W11_time_start = $request['W11_time_start'];
      $report->W12_time_start = $request['W12_time_start'];
      $report->W13_time_start = $request['W13_time_start'];
      $report->W14_time_start = $request['W14_time_start'];
      $report->W15_time_start = $request['W15_time_start'];
      $report->W1_time_end = $request['W1_time_end'];
      $report->W2_time_end = $request['W2_time_end'];
      $report->W3_time_end = $request['W3_time_end'];
      $report->W4_time_end = $request['W4_time_end'];
      $report->W5_time_end = $request['W5_time_end'];
      $report->W6_time_end = $request['W6_time_end'];
      $report->W7_time_end = $request['W7_time_end'];
      $report->W8_time_end = $request['W8_time_end'];
      $report->W9_time_end = $request['W9_time_end'];
      $report->W10_time_end = $request['W10_time_end'];
      $report->W11_time_end = $request['W11_time_end'];
      $report->W12_time_end = $request['W12_time_end'];
      $report->W13_time_end = $request['W13_time_end'];
      $report->W14_time_end = $request['W14_time_end'];
      $report->W15_time_end = $request['W15_time_end'];
      $report->W1_ref = $request['W1_ref'];
      $report->W2_ref = $request['W2_ref'];
      $report->W3_ref = $request['W3_ref'];
      $report->W4_ref = $request['W4_ref'];
      $report->W5_ref = $request['W5_ref'];
      $report->W6_ref = $request['W6_ref'];
      $report->W7_ref = $request['W7_ref'];
      $report->W8_ref = $request['W8_ref'];
      $report->W9_ref = $request['W9_ref'];
      $report->W10_ref = $request['W10_ref'];
      $report->W11_ref = $request['W11_ref'];
      $report->W12_ref = $request['W12_ref'];
      $report->W13_ref = $request['W13_ref'];
      $report->W14_ref = $request['W14_ref'];
      $report->W15_ref = $request['W15_ref'];
      $report->save();


      if(isset($request->tag)){
        $count_tag =  count($request->tag);
        for($i = 0 ; $i < $count_tag ; $i++){
          $tag = new Tag;
          $tag->report_id = $report->id;
          $tag->tag_user_id = $request->tag[$i];
          $tag->save();
        }
      }

      if(isset($request->work)){
        $count_work =  count($request->work);
        for($i = 0 ; $i < $count_work ; $i++){
          $work = new WorkReport;
          $work->report = $report->id;
          $work->work_id = $request->work[$i];
          $work->save();
        }
      }


      if($request->file('file')){
        foreach($request->file('file') as $file)
          {
            $fileName = time().'.'.$file->getClientOriginalName();
              $file->move(public_path('uploads'), $fileName);
              $data=new ReportItemFile;
              $data->report_id=$report->id;
              $data->file=$fileName;
              $data->save();
          }
        }

      return redirect()->back()->with('alert', 'สร้างรายงานสำเร็จ!');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $myid = Auth::user()->id;
        $usertype = Auth::user()->type;
        if($usertype==1){
            $fileName = ReportItemFile::where('visible',1)->get();
            $report = Report::where('name_id',$myid)->where('visible',2)->orWhere('visible',4)->orderby('workDate','desc')->get();
            return view('DailyReport.user.ReportHistory')->with(['user' => User::findOrFail($myid),'report'=> $report,'fileName'=>$fileName]);
        }
        else{
          $pendingCount = Report::where('visible',2)->where('status',"pending")->orderby('workDate','desc')->count();
          $rejectCount = Report::where('visible',3)->where('status',"reject")->orderby('workDate','desc')->count();
          $sentCount = Report::where('visible',4)->where('status',"resent")->orderby('workDate','desc')->count();
          $reportCount = Report::where('visible',2)->orderby('workDate','desc')->count();
          return view('admin.dashboard')->with('pendingCount',$pendingCount)
                                        ->with('rejectCount',$rejectCount)
                                        ->with('sentCount',$sentCount)
                                        ->with('reportCount',$reportCount);
        }

    }


    public function showtag()
    {
        $myid = Auth::user()->id;
        $tag_report_id = Tag::where('tag_user_id',$myid)->get('report_id');
        $array_report_tag =[];
        foreach($tag_report_id as $report_id){
            array_push($array_report_tag,$report_id->report_id);
        }

        $fileName = ReportItemFile::where('visible',1)->get();
        $report = Report::whereIn('id',$array_report_tag)->orderby('workDate','desc')->get();
        // return ($array_report_tag);
        $user_type = Auth::user()->type;
        if($user_type ==1){
            return view('DailyReport.user.ReportTag')->with('fileName',$fileName)
                                                ->with('report',$report)
                                                ;
        }
        else{
            return view('DailyReport.admin.ReportTagadmin')->with('fileName',$fileName)
                                                    ->with('report',$report)
                                                    ;
        }
        



    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $myid = Auth::user();

        $report = report::find($id);
        
        if(isset($request->Work_status)){
            $report->Work_status = $request['Work_status'];
            if($request['Work_status'] == "reject"){
            $report->visible = 3;
            }
            elseif($request['Work_status'] == "Pending"){
            $report->visible = 2;
            }
            elseif($request['Work_status'] == "Approved"){
            $report->visible = 2;
            }
            $report->Work_status = $request['Work_status'];
            $report->save();
        }
            
        if(isset($request->comment)){
            $comment = New ReportCm;
            $comment->report_id = $id;
            $comment->cm = $request->comment;
            $comment->cm_user_id = $myid->id;
            $comment->save();
        }


        return redirect()->back()->with('alert', 'แก้ไขสำเร็จ!');

    }


    public function DarftUpdate(Request $request, $id)
    {

        // return($request);

        $report = report::find($id);
        $report->Work1 = $request['Work1'];
        $report->Work2 = $request['Work2'];
        $report->Work3 = $request['Work3'];
        $report->Work4 = $request['Work4'];
        $report->Work5 = $request['Work5'];
        $report->Work6 = $request['Work6'];
        $report->Work7 = $request['Work7'];
        $report->Work8 = $request['Work8'];
        $report->Work9 = $request['Work9'];
        $report->Work10 = $request['Work10'];
        $report->Work11 = $request['Work11'];
        $report->Work12 = $request['Work12'];
        $report->Work13 = $request['Work13'];
        $report->Work14 = $request['Work14'];
        $report->Work15 = $request['Work15'];
        $report->W1_time_start = $request['W1_time_start'];
        $report->W2_time_start = $request['W2_time_start'];
        $report->W3_time_start = $request['W3_time_start'];
        $report->W4_time_start = $request['W4_time_start'];
        $report->W5_time_start = $request['W5_time_start'];
        $report->W6_time_start = $request['W6_time_start'];
        $report->W7_time_start = $request['W7_time_start'];
        $report->W8_time_start = $request['W8_time_start'];
        $report->W9_time_start = $request['W9_time_start'];
        $report->W10_time_start = $request['W10_time_start'];
        $report->W11_time_start = $request['W11_time_start'];
        $report->W12_time_start = $request['W12_time_start'];
        $report->W13_time_start = $request['W13_time_start'];
        $report->W14_time_start = $request['W14_time_start'];
        $report->W15_time_start = $request['W15_time_start'];
        $report->W1_time_end = $request['W1_time_end'];
        $report->W2_time_end = $request['W2_time_end'];
        $report->W3_time_end = $request['W3_time_end'];
        $report->W4_time_end = $request['W4_time_end'];
        $report->W5_time_end = $request['W5_time_end'];
        $report->W6_time_end = $request['W6_time_end'];
        $report->W7_time_end = $request['W7_time_end'];
        $report->W8_time_end = $request['W8_time_end'];
        $report->W9_time_end = $request['W9_time_end'];
        $report->W10_time_end = $request['W10_time_end'];
        $report->W11_time_end = $request['W11_time_end'];
        $report->W12_time_end = $request['W12_time_end'];
        $report->W13_time_end = $request['W13_time_end'];
        $report->W14_time_end = $request['W14_time_end'];
        $report->W15_time_end = $request['W15_time_end'];
        $report->W1_ref = $request['W1_ref'];
        $report->W2_ref = $request['W2_ref'];
        $report->W3_ref = $request['W3_ref'];
        $report->W4_ref = $request['W4_ref'];
        $report->W5_ref = $request['W5_ref'];
        $report->W6_ref = $request['W6_ref'];
        $report->W7_ref = $request['W7_ref'];
        $report->W8_ref = $request['W8_ref'];
        $report->W9_ref = $request['W9_ref'];
        $report->W10_ref = $request['W10_ref'];
        $report->W11_ref = $request['W11_ref'];
        $report->W12_ref = $request['W12_ref'];
        $report->W13_ref = $request['W13_ref'];
        $report->W14_ref = $request['W14_ref'];
        $report->W15_ref = $request['W15_ref'];
        $report->save();


        // return($request->tag);

        

            $tag_report = Tag::where('report_id',$id)->get();
            foreach($tag_report as $tag){
                $del = Tag::find($tag->id);
                $del->delete();
            }


        if(isset($request->tag)){
            $count_tag =  count($request->tag);
            for($i = 0 ; $i < $count_tag ; $i++){
              $tag = new Tag;
              $tag->report_id = $report->id;
              $tag->tag_user_id = $request->tag[$i];
              $tag->save();
            }
        }


        if($request->file('file')){
            foreach($request->file('file') as $file)
              {
                  $fileName = time().'.'.$file->getClientOriginalName();
                  $file->move(public_path('uploads'), $fileName);
                  $data=new ReportItemFile;
                  $data->report_id=$report->id;
                  $data->file=$fileName;
                  $data->save();
              }
            }

        return redirect()->back() ->with('alert', 'updateสำเร็จ!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sentReport($id)
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $report = report::find($id);
        $report->visible = 2;
        $report->timestamp = $current_date_time;
        $report->save();
        return redirect()->back()->with('alert', 'ส่งรายงานสำเร็จ!');
    }

    public function resent($id)
    {
        $report = report::find($id);
        $report->visible = 4;
        $report->Work_status = 'Resent';
        $report->save();
        return redirect()->back()->with('alert', 'ส่งรายงานสำเร็จ!');
    }

    public function delReport($id)
    {
        $report = report::find($id);
        $report->visible = 0;
        $report->save();
        return redirect()->back() ->with('alert', 'ลบรายงานสำเร็จ!');
    }
}
