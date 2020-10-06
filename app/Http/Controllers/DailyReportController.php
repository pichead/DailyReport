<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $report = Report::orderby('workDate','desc')->get();
        return view('DailyReport/index')->with('report',$report);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report = Report::orderby('workDate','desc')->get();
        return view('DailyReport/create')->with('report',$report);
    }

    public function report_history()
    {
        $report = Report::where('name_id',$id)->orderby('workDate','desc')->get();
        return view('DailyReport/ReportHistory')->with('report',$report);
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
      return view('DailyReport/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::where('name_id',$id)->orderby('workDate','desc')->get();
        return view('DailyReport/ReportHistory')->with(['user' => User::findOrFail($id),'report'=> $report,]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
