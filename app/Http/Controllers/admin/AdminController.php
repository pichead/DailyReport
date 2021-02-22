<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\ReportItemFile;
use Auth;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $pendingCount = Report::where('status',"pending")->orderby('workDate','desc')->count();
        $rejectCount = Report::where('status',"reject")->orderby('workDate','desc')->count();
        $sentCount = Report::where('status',"resent")->orderby('workDate','desc')->count();
        $reportCount = Report::where('visible',2)->orderby('workDate','desc')->count();
        // return view('admin.dashboard')->with('pendingCount',$pendingCount)->with('rejectCount',$rejectCount)->with('sentCount',$sentCount)->with('reportCount',$reportCount);
        return($pendingCount);
    }
}
