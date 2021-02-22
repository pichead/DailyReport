@extends('layouts.web')

@section('content')
@csrf
<div class="col-12">
  <div class="col-12 col-md-10 col-lg-8 mx-auto">
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ชนิดงาน</th>
                    <th>วันที่ทำงาน</th>
                    <th>สถานะรายงาน</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach($report as $report_row)
                <tr>
                    <th data-toggle="modal" data-target="#No{{$report_row->id}}">{{$loop->index + 1}}</th>
                    <td data-toggle="modal" data-target="#No{{$report_row->id}}">{{$report_row->Work_type}}</td>
                    <td data-toggle="modal" data-target="#No{{$report_row->id}}">{{$report_row->WorkDate->format('d-m-Y')}}</td>
                    <td data-toggle="modal" data-target="#No{{$report_row->id}}">
                      {{$report_row->Work_status}}
                    @if(isset($report_row->cm))
                    *
                    @else
                    @endif
                    </td>
                    <td><a  target="_blank" class="btn-sm btn-info" href="{{asset('/view/report/'.$report_row->id)}}">อ่านรายงาน</a></td>
                </tr>

                @endforeach
            </tbody>

        </table>
        @foreach($report as $report_row)

        <div class="modal" id="No{{$report_row->id}}" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title col-4 col-md-5">{{$report_row->User->name}}</h5>
                        <h5 class="modal-title">ประจำวันที่ : {{$report_row->WorkDate->format('d-m-Y')}}</h5>
                        <button class="close mr-3" data-dismiss="modal">X</button>
                      </div>


                      <div class="modal-body" >
                      <div class="form-group col-6">

                      @foreach($fileName as $file_row)
                        @if($report_row->id==$file_row->report_id)
                        <a href="{{asset('/uploads').'/'.$file_row->file.'/'}}">{{$file_row->file}}</a>
                        <br>
                        @else
                        @endif
                      @endforeach

                    </div>
                        <table class="table table-striped col-12 mx-auto" style="border-bottom: solid 1px;">
                            <thead>
                                    <tr class="row mx-auto">
                                        <th class="col-1 text-center">No.</th>
                                        <th class="col-5">รายการงาน</th>
                                        <th class="col-3 text-center">เวลาที่ทำงาน</th>
                                        <th class="col-3 text-center">ผู้มอบหมาย</th>
                                    </tr>
                            </thead>

                                <tbody >

                                  @if(isset($report_row->Work1))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">1</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work1)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W1_time_start}} - {{$report_row->W1_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W1_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work2))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">2</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work2)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W2_time_start}} - {{$report_row->W2_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W2_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work3))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">3</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work3)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W3_time_start}} - {{$report_row->W3_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W3_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work4))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">4</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work4)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W4_time_start}} - {{$report_row->W4_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W4_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work5))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">5</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work5)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W5_time_start}} - {{$report_row->W5_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W5_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work6))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">6</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work6)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W6_time_start}} - {{$report_row->W6_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W6_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work7))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">7</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work7)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W7_time_start}} - {{$report_row->W7_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W7_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work8))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">8</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work8)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W8_time_start}} - {{$report_row->W8_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W8_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work9))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">9</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work9)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W9_time_start}} - {{$report_row->W9_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W9_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work10))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">10</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work10)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W10_time_start}} - {{$report_row->W10_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W10_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work11))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">11</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work11)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W11_time_start}} - {{$report_row->W11_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W11_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work12))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">12</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work12)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W12_time_start}} - {{$report_row->W12_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W12_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work13))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">13</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work13)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W13_time_start}} - {{$report_row->W13_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W13_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work14))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">14</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work14)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W14_time_start}} - {{$report_row->W14_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W14_ref}}</td>
                                  </tr>
                                  @else
                                  @endif
                                  @if(isset($report_row->Work15))
                                  <tr class="row mx-auto">
                                    <td class="col-1 text-center">15</td>
                                    <td class="col-5">{!! nl2br(e($report_row->Work15)) !!}</td>
                                    <td class="col-3 text-center">{{$report_row->W15_time_start}} - {{$report_row->W15_time_end}}</td>
                                    <td class="col-3 text-center">{{$report_row->W15_ref}}</td>
                                  </tr>
                                  @else
                                  @endif

                                </tbody>
                        </table>

                        @if(isset($report_row->cm))

                        <div class="col-10 my-3 mxauto">
                          <h5>Comment</h5>
                          {{$report_row->cm}}
                        </div>
                        @else
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
        @endforeach
  </div>
</div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>



@endsection
