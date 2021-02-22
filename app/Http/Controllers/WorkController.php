<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\ReportCm;
use App\Models\Work;
use App\Models\WorkAssignment;
use App\Models\WorkFile;
use App\Models\WorkReport;
use App\Models\WorkReporting;
use App\Models\User;
use App\Models\ReportStatus;
use App\Models\ReportItemFile;
use App\Models\Tag;
use Carbon\Carbon;
use DateTime;
use Auth;
use DB;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myid = Auth::user();
        $works = Work::where('visible',1)->get();

        return view('work.index')->with('works',$works);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('work.create');
    }

    public function storereporting(Request $request)
    {
        $myid = Auth::user();

        $work = Work::Find($request->work_id);
        $work->progress = $request->progress;
        $work->save();
    
        if(isset($request->work_text)){
            $reporting = new WorkReporting;
            $reporting->work_id = $request->work_id;
            $reporting->user_id = $myid->id;
            $reporting->reporting = $request->work_text;
            $reporting->save();
        }
        

        return redirect()->back()->with('alert', 'อัพเดตข้อมูลสำเร็จ!');

    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $myid = Auth::user();
        $work = new Work();
        $work->name = $request->name;
        $work->detail = $request->detail;
        $work->start_date = $request->start_date;
        $work->end_date = $request->end_date;
        $work->created_by = $myid->id;
        $work->save();

        if(isset($request->user)){
            $count_user = count($request->user);
            for($i = 0 ; $i < $count_user ; $i++){
                
                $work_user = new WorkAssignment();
                $work_user->work_id = $work->id;
                $work_user->user_id = $request->user[$i];
                $work_user->save();

            }
        }

        if($request->file('file')){
            foreach($request->file('file') as $file){
                $fileName = time().'.'.$file->getClientOriginalName();
                  $file->move(public_path('uploads'), $fileName);
                  $data=new WorkFile;
                  $data->work_id = $work->id;
                  $data->name = $fileName;
                  $data->save();
            }
        }
        return redirect()->back()->with('alert', 'สร้างงานสำเร็จ!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::where('id',$id)->first();
        $workreportings = WorkReporting::where('work_id',$id)->orderBy('id', 'DESC')->get();
        $users = WorkAssignment::where('work_id',$id)->get();
        $fileName = WorkFile::where('work_id',$id)->get();
        return view('work.view')->with('work',$work)
                                ->with('users',$users)
                                ->with('id',$id)
                                ->with('fileName',$fileName)
                                ->with('workreportings',$workreportings);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::where('id',$id)->first();
        $users = WorkAssignment::where('work_id',$id)->get();
        $fileName = WorkFile::where('work_id',$id)->get();
        return view('work.edit')->with('work',$work)->with('users',$users)->with('id',$id)->with('fileName',$fileName);
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
        $work = Work::Find($id);
        $work->name = $request->name;
        $work->detail = $request->detail;
        $work->start_date = $request->start_date;
        $work->end_date = $request->end_date;
        $work->save();


        $work_users = WorkAssignment::where('work_id',$id)->get();
        foreach($work_users as $work_user){
            $work_user->delete();
        }

        if(isset($request->tag)){
            $count_user = count($request->tag);
            for($i = 0 ; $i < $count_user ; $i++){
                $work_user = new WorkAssignment();
                $work_user->work_id = $work->id;
                $work_user->user_id = $request->tag[$i];
                $work_user->save();

            }
        }

        if($request->file('file')){
            foreach($request->file('file') as $file){
                $fileName = time().'.'.$file->getClientOriginalName();
                  $file->move(public_path('uploads'), $fileName);
                  $data=new WorkFile;
                  $data->work_id = $work->id;
                  $data->name = $fileName;
                  $data->save();
            }
        }
        return redirect()->back()->with('alert', 'แก้ไขสำเร็จ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
