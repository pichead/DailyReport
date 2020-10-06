@extends('layouts.admin')

@section('content')
<div class="col-12">
  <div class="col-12 col-md-8 col-lg-6 mx-auto">
    <table class="table table-striped text-center">
            <thead>
                <tr class="row">
                    <th class="col-2">No.</th>
                    <th class="col-5">รายงานประจำวัน</th>
                    <th class="col-5">วันที่ทำงาน</th>

                </tr>
            </thead>
            <tbody>
              @foreach($report as $report_row)
                <tr class="row" data-toggle="modal" data-target="#No{{$report_row->id}}">
                    <th class="col-2">{{$loop->index + 1}}</th>
                    <td class="col-5">{{$report_row->User->name}}</td>
                    <td class="col-5">{{$report_row->WorkDate->format('d-m-Y')}}</td>
                </tr>

                

                @endforeach
            </tbody>
            
        </table>
        @foreach($report as $report_row)
        <div class="modal" id="No{{$report_row->id}}" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-xl col-12">
                    <div class="modal-content">
                      <div class="modal-header row">
                        <h5 class="modal-title col-4 col-md-5">{{$report_row->User->name}}</h5>
                        <h5 class="modal-title">ประจำวันที่ : {{$report_row->WorkDate->format('d-m-Y')}}</h5>
                        <button class="close mr-3" data-dismiss="modal">X</button>
                      </div>
                      <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                    <tr class="row">
                                        <th class="col-1 text-center">No.</th>
                                        <th class="col-7">รายการงาน</th>
                                        <th class="col-2 text-center">เวลาที่ทำงาน</th>
                                        <th class="col-2 text-center">ผู้มอบหมาย</th>
                                    </tr>
                            </thead>

                                <tbody>

                                  <tr class="row">
                                    <td class="col-1 text-center">1</td>
                                    <td class="col-7">{{$report_row->Work1}}</td>
                                    <td class="col-2 text-center">{{$report_row->W1_time_start}} - {{$report_row->W1_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W1_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">2</td>
                                    <td class="col-7">{{$report_row->Work2}}</td>
                                    <td class="col-2 text-center">{{$report_row->W2_time_start}} - {{$report_row->W2_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W2_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">3</td>
                                    <td class="col-7">{{$report_row->Work3}}</td>
                                    <td class="col-2 text-center">{{$report_row->W3_time_start}} - {{$report_row->W3_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W3_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">4</td>
                                    <td class="col-7">{{$report_row->Work4}}</td>
                                    <td class="col-2 text-center">{{$report_row->W4_time_start}} - {{$report_row->W4_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W4_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">5</td>
                                    <td class="col-7">{{$report_row->Work5}}</td>
                                    <td class="col-2 text-center">{{$report_row->W5_time_start}} - {{$report_row->W5_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W5_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">6</td>
                                    <td class="col-7">{{$report_row->Work6}}</td>
                                    <td class="col-2 text-center">{{$report_row->W6_time_start}} - {{$report_row->W6_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W6_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">7</td>
                                    <td class="col-7">{{$report_row->Work7}}</td>
                                    <td class="col-2 text-center">{{$report_row->W7_time_start}} - {{$report_row->W7_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W7_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">8</td>
                                    <td class="col-7">{{$report_row->Work8}}</td>
                                    <td class="col-2 text-center">{{$report_row->W8_time_start}} - {{$report_row->W8_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W8_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">9</td>
                                    <td class="col-7">{{$report_row->Work9}}</td>
                                    <td class="col-2 text-center">{{$report_row->W9_time_start}} - {{$report_row->W9_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W9_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">10</td>
                                    <td class="col-7">{{$report_row->Work10}}</td>
                                    <td class="col-2 text-center">{{$report_row->W10_time_start}} - {{$report_row->W10_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W10_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">11</td>
                                    <td class="col-7">{{$report_row->Work11}}</td>
                                    <td class="col-2 text-center">{{$report_row->W11_time_start}} - {{$report_row->W11_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W11_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">12</td>
                                    <td class="col-7">{{$report_row->Work12}}</td>
                                    <td class="col-2 text-center">{{$report_row->W12_time_start}} - {{$report_row->W12_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W12_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">13</td>
                                    <td class="col-7">{{$report_row->Work13}}</td>
                                    <td class="col-2 text-center">{{$report_row->W13_time_start}} - {{$report_row->W13_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W13_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">14</td>
                                    <td class="col-7">{{$report_row->Work14}}</td>
                                    <td class="col-2 text-center">{{$report_row->W14_time_start}} - {{$report_row->W14_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W14_ref}}</td>
                                  </tr>
                                  <tr class="row">
                                    <td class="col-1 text-center">15</td>
                                    <td class="col-7">{{$report_row->Work15}}</td>
                                    <td class="col-2 text-center">{{$report_row->W15_time_start}} - {{$report_row->W15_time_end}}</td>
                                    <td class="col-2 text-center">{{$report_row->W15_ref}}</td>
                                  </tr>
                                </tbody>
                        </table>
                 
                      </div>
                    </div>
                  </div>
                </div>
        @endforeach
        
  </div>
</div>




@endsection
