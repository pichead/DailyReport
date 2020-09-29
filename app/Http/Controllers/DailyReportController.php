<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
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
        return view('DailyReport/create');
    }

    public function report()
    {
        return view('DailyReport/report');
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
      $report->Name = $request['Name'];
      $report->workDate = $request['WorkDate'];
      $report->Work1 = $request['Work1'];
      $report->Work2 = $request['Work2'];
      $report->Work3 = $request['Work3'];
      $report->Work4 = $request['Work4'];
      $report->Work5 = $request['Work5'];
      $report->Work6 = $request['Work6'];
      $report->save();
      return view('DailyReport/create');

      //
      // $stock = new Stock();
      // $stock->name = $request['name'];
      // $stock->received_unit = $request['received_unit'];
      // $stock->spent_unit = $request['spent_unit'];
      // $stock->receive_per_spent_unit = $request['receive_per_spent_unit'];
      // $stock->cost_received_unit = $request['cost_received_unit'];
      // $stock->sell_price = $request['sell_price'];
      // $stock->created_date = date('Y-m-d H:i:s');;
      // $stock->manufacturer_id = $request['manufacturer'];
      // $stock->visible = 1;
      // $stock->commissionable = isset($request->commissionable) ? 1 : 0;
      // $stock->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
