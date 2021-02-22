<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\ReportItemFile;
use Auth;
use DB;

use App\Models\Tag;
use App\Models\WorkAssignment;
use App\Models\WorkReport;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->user()->type == 0) {
          $pendingCount = Report::where('visible',2)->where('Work_status',"pending")->orderby('workDate','desc')->count();
          $rejectCount = Report::where('visible',3)->where('Work_status',"reject")->orderby('workDate','desc')->count();
          $sentCount = Report::where('visible',4)->where('Work_status',"resent")->orderby('workDate','desc')->count();
          $reportCount = Report::where('visible',2)->orderby('workDate','desc')->count();
          return view('admin.dashboard')->with('pendingCount',$pendingCount)->with('rejectCount',$rejectCount)->with('sentCount',$sentCount)->with('reportCount',$reportCount);
          // return($pendingCount);
        } else {
            $myid = Auth::user()->id;
            $work_tags = WorkAssignment::where('user_id',$myid)->get();
            $countdraft = Report::where('name_id',$myid)->where('visible',1)->orderby('workDate','desc')->count();
            $countsent = Report::where('name_id',$myid)->where('visible',2)->orderby('workDate','desc')->count();
            $countreject = Report::where('name_id',$myid)->where('visible',3)->orderby('workDate','desc')->count();
            $countresent = Report::where('name_id',$myid)->where('visible',4)->orderby('workDate','desc')->count();

            // return($count);
            return view('home')->with('countdraft',$countdraft)
                                ->with('countsent',$countsent)
                                ->with('countreject',$countreject)
                                ->with('countresent',$countresent)
                                ->with('work_tags',$work_tags);
        }
    }


    public function store(Request $request)
    {

    }
}
