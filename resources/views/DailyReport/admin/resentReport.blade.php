@extends('layouts.admin')

@section('content')

<div class="col-10 mx-auto">

  <br>
  <div class="clearfix">
    <input class="form-control col-3 float-right" type="text" id="searchInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">
  </div>
  <br>
  <div class="h4">Resent Report</div>
  <table  class="table table-striped text-center">
    <thead>
      <tr class="row mx-0">
        <th class="col-1">No.</th>
        <th class="col-4">รายงานประจำวัน</th>
        <th class="col-3">วันที่ทำงาน</th>
        <th class="col-2">สถานะ</th>
        <th class="col-2"></th>
      </tr>
    </thead>
    <tbody id="reportTable">
      @if(($resentCount) == "0")
      <tr class="row">
        <td class="text-center col-12">ไม่มีรายงาน</td>
      </tr>
      @else
      @foreach($resentReport as $key=>$resentReport_row)
      <tr class="row mx-0" data-toggle="modal" data-target="#No{{$resentReport_row->id}}">
        <td class="col-1">{{++$key}}</th>
        <td class="col-4">{{$resentReport_row->User->name}}</td>
        <td class="col-3">{{$resentReport_row->WorkDate->format('d-m-Y')}}</td>

        @if($resentReport_row->Work_status=="Pending")
        <td class="col-2" style="color: red;">{{$resentReport_row->Work_status}}</td>
        @else
        <td class="col-2">{{$resentReport_row->Work_status}}</td>
        @endif
        <td><a target="_blank" class="btn-sm btn-info" href="{{asset('/view/report/'.$resentReport_row->id)}}">อ่านรายงาน
        </a></td>
      </tr>
      @endforeach
      @endif

      </tbody>

  </table>

  @foreach($resentReport as $resentReport_row)
  <div class="modal" id="No{{$resentReport_row->id}}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title col-4 col-md-5">{{$resentReport_row->User->name}}</h5>
          <h5 class="modal-title">วันที่ : {{$resentReport_row->WorkDate->format('d-m-Y')}}</h5>
          <button class="close mr-3" data-dismiss="modal">X</button>
        </div>

        <div class="modal-body">

          @foreach($fileName as $file_row)
            @if($resentReport_row->id==$file_row->report_id)
            <a href="{{asset('/uploads').'/'.$file_row->file.'/'}}">{{$file_row->file}}</a>
            <br>
            @else
            @endif
          @endforeach

          <table class="table table-striped col-12 mx-auto" style="border-bottom: solid 1px;">
            <thead>
              <tr class="row mx-auto">
                <th class="col-1 text-center">No.</th>
                <th class="col-7">รายการงาน</th>
                <th class="col-2 text-center">เวลาที่ทำงาน</th>
                <th class="col-2 text-center">ผู้มอบหมาย</th>
              </tr>
            </thead>

            <tbody>

              <tr class="row mx-auto">
                <td class="col-1 text-center">1</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work1)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W1_time_start}} - {{$resentReport_row->W1_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W1_ref}}</td>
              </tr>

              @if(isset($resentReport_row->Work2))
              <tr class="row mx-auto">
                <td class="col-1 text-center">2</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work2)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W2_time_start}} - {{$resentReport_row->W2_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W2_ref}}</td>
              </tr>
              @else
              @endif

              @if(isset($resentReport_row->Work3))
              <tr class="row mx-auto">
                <td class="col-1 text-center">3</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work3)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W3_time_start}} - {{$resentReport_row->W3_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W3_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work4))
              <tr class="row mx-auto">
                <td class="col-1 text-center">4</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work4)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W4_time_start}} - {{$resentReport_row->W4_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W4_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work5))
              <tr class="row mx-auto">
                <td class="col-1 text-center">5</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work5)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W5_time_start}} - {{$resentReport_row->W5_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W5_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work6))
              <tr class="row mx-auto">
                <td class="col-1 text-center">6</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work6)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W6_time_start}} - {{$resentReport_row->W6_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W6_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work7))
              <tr class="row mx-auto">
                <td class="col-1 text-center">7</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work7)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W7_time_start}} - {{$resentReport_row->W7_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W7_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work8))
              <tr class="row mx-auto">
                <td class="col-1 text-center">8</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work8)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W8_time_start}} - {{$resentReport_row->W8_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W8_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work9))
              <tr class="row mx-auto">
                <td class="col-1 text-center">9</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work9)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W9_time_start}} - {{$resentReport_row->W9_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W9_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work10))
              <tr class="row mx-auto">
                <td class="col-1 text-center">10</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work10)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W10_time_start}} - {{$resentReport_row->W10_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W10_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work11))
              <tr class="row mx-auto">
                <td class="col-1 text-center">11</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work11)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W11_time_start}} - {{$resentReport_row->W11_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W11_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work12))
              <tr class="row mx-auto">
                <td class="col-1 text-center">12</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work12)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W12_time_start}} - {{$resentReport_row->W12_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W12_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work13))
              <tr class="row mx-auto">
                <td class="col-1 text-center">13</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work13)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W13_time_start}} - {{$resentReport_row->W13_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W13_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work14))
              <tr class="row mx-auto">
                <td class="col-1 text-center">14</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work14)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W14_time_start}} - {{$resentReport_row->W14_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W14_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($resentReport_row->Work15))
              <tr class="row mx-auto">
                <td class="col-1 text-center">15</td>
                <td class="col-7">{!! nl2br(e($resentReport_row->Work15)) !!}</td>
                <td class="col-2 text-center">{{$resentReport_row->W15_time_start}} - {{$resentReport_row->W15_time_end}}</td>
                <td class="col-2 text-center">{{$resentReport_row->W15_ref}}</td>
              </tr>
              @else
              @endif

            </tbody>
          </table>

          {{-- <form method="post" action="{{asset('report').'/'.$resentReport_row->id}}">
            {{method_field('PUT')}}

            @csrf

            <div class="col-8 row mx-auto my-2">
              <div class="col-4 px-0">
                <button id="btn-edit{{$resentReport_row->id}}" type="button" class="btn btn-success">แก้ไข</button>

                <button id="btn-submit{{$resentReport_row->id}}" class="btn btn-primary " style="display: none;" name="create" type="submit" value="บันทึกข้อมูล">ยืนยัน</button>
                <a id="btn-cancel{{$resentReport_row->id}}" class="btn btn-danger " style="display: none;" href="{{asset('/DailyReport')}}">ยกเลิก</a>
              </div>
              <div class="col-8 px-0">
                <select class="custom-select mr-sm-2 model-edit{{$resentReport_row->id}}" id="inlineFormCustomSelect" disabled name="Work_status">
                  <option hidden>{{$resentReport_row->Work_status}}</option>
                  <option value="Approved">Approved</option>
                  <option value="Pending">Pending</option>
                  <option value="reject">reject</option>
                </select>
              </div>
            </div>

            <div class="col-8 mx-auto mb-2">
              <div class="col-12 px-0">comment</div>
              <textarea class="form-control model-edit{{$resentReport_row->id}}" id="message" rows="2" name="comment" disabled>{{$resentReport_row->cm}}</textarea>
            </div>
          </form> --}}

        </div>
      </div>
    </div>
  </div>
  @endforeach

  <br>
  <div class="h4">Reject Report</div>
  <table  class="table table-striped text-center">
    <thead>
      <tr class="row mx-0">
        <th class="col-1">No.</th>
        <th class="col-4">รายงานประจำวัน</th>
        <th class="col-3">วันที่ทำงาน</th>
        <th class="col-2">สถานะ</th>
        <th class="col-2"></th>
      </tr>
    </thead>
    <tbody id="reportTable">
      @if(($rejectCount) == "0")
      <tr class="row">
        <td class="text-center col-12">ไม่มีรายงาน</td>
      </tr>
      @else
        @foreach($rejectReport as $key=>$report_row)
        <tr class="row mx-0" data-toggle="modal" data-target="#No{{$report_row->id}}">
          <td class="col-1">{{++$key}}</th>
          <td class="col-4">{{$report_row->User->name}}</td>
          <td class="col-3">{{$report_row->WorkDate->format('d-m-Y')}}</td>
          @if($report_row->Work_status=="Pending")
          <td class="col-2" style="color: red;">{{$report_row->Work_status}}</td>
          @else
          <td class="col-2">{{$report_row->Work_status}}</td>
          @endif
          <td><a target="_blank" class="btn-sm btn-info" href="{{asset('/view/report/'.$report_row->id)}}">อ่านรายงาน
          </a></td>
        </tr>
        @endforeach
      @endif
      </tbody>

  </table>


  @foreach($rejectReport as $report_row)
  <div class="modal" id="No{{$report_row->id}}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title col-4 col-md-5">{{$report_row->User->name}}</h5>
          <h5 class="modal-title">วันที่ : {{$report_row->WorkDate->format('d-m-Y')}}</h5>
          <button class="close mr-3" data-dismiss="modal">X</button>
        </div>

        <div class="modal-body">

          @foreach($fileName as $file_row)
            @if($report_row->id==$file_row->report_id)
            <a href="{{asset('/uploads').'/'.$file_row->file.'/'}}">{{$file_row->file}}</a>
            <br>
            @else
            @endif
          @endforeach

          <table class="table table-striped col-12 mx-auto" style="border-bottom: solid 1px;">
            <thead>
              <tr class="row mx-auto">
                <th class="col-1 text-center">No.</th>
                <th class="col-7">รายการงาน</th>
                <th class="col-2 text-center">เวลาที่ทำงาน</th>
                <th class="col-2 text-center">ผู้มอบหมาย</th>
              </tr>
            </thead>

            <tbody>

              <tr class="row mx-auto">
                <td class="col-1 text-center">1</td>
                <td class="col-7">{!! nl2br(e($report_row->Work1)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W1_time_start}} - {{$report_row->W1_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W1_ref}}</td>
              </tr>

              @if(isset($report_row->Work2))
              <tr class="row mx-auto">
                <td class="col-1 text-center">2</td>
                <td class="col-7">{!! nl2br(e($report_row->Work2)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W2_time_start}} - {{$report_row->W2_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W2_ref}}</td>
              </tr>
              @else
              @endif

              @if(isset($report_row->Work3))
              <tr class="row mx-auto">
                <td class="col-1 text-center">3</td>
                <td class="col-7">{!! nl2br(e($report_row->Work3)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W3_time_start}} - {{$report_row->W3_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W3_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work4))
              <tr class="row mx-auto">
                <td class="col-1 text-center">4</td>
                <td class="col-7">{!! nl2br(e($report_row->Work4)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W4_time_start}} - {{$report_row->W4_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W4_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work5))
              <tr class="row mx-auto">
                <td class="col-1 text-center">5</td>
                <td class="col-7">{!! nl2br(e($report_row->Work5)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W5_time_start}} - {{$report_row->W5_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W5_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work6))
              <tr class="row mx-auto">
                <td class="col-1 text-center">6</td>
                <td class="col-7">{!! nl2br(e($report_row->Work6)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W6_time_start}} - {{$report_row->W6_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W6_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work7))
              <tr class="row mx-auto">
                <td class="col-1 text-center">7</td>
                <td class="col-7">{!! nl2br(e($report_row->Work7)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W7_time_start}} - {{$report_row->W7_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W7_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work8))
              <tr class="row mx-auto">
                <td class="col-1 text-center">8</td>
                <td class="col-7">{!! nl2br(e($report_row->Work8)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W8_time_start}} - {{$report_row->W8_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W8_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work9))
              <tr class="row mx-auto">
                <td class="col-1 text-center">9</td>
                <td class="col-7">{!! nl2br(e($report_row->Work9)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W9_time_start}} - {{$report_row->W9_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W9_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work10))
              <tr class="row mx-auto">
                <td class="col-1 text-center">10</td>
                <td class="col-7">{!! nl2br(e($report_row->Work10)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W10_time_start}} - {{$report_row->W10_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W10_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work11))
              <tr class="row mx-auto">
                <td class="col-1 text-center">11</td>
                <td class="col-7">{!! nl2br(e($report_row->Work11)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W11_time_start}} - {{$report_row->W11_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W11_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work12))
              <tr class="row mx-auto">
                <td class="col-1 text-center">12</td>
                <td class="col-7">{!! nl2br(e($report_row->Work12)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W12_time_start}} - {{$report_row->W12_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W12_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work13))
              <tr class="row mx-auto">
                <td class="col-1 text-center">13</td>
                <td class="col-7">{!! nl2br(e($report_row->Work13)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W13_time_start}} - {{$report_row->W13_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W13_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work14))
              <tr class="row mx-auto">
                <td class="col-1 text-center">14</td>
                <td class="col-7">{!! nl2br(e($report_row->Work14)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W14_time_start}} - {{$report_row->W14_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W14_ref}}</td>
              </tr>
              @else
              @endif
              @if(isset($report_row->Work15))
              <tr class="row mx-auto">
                <td class="col-1 text-center">15</td>
                <td class="col-7">{!! nl2br(e($report_row->Work15)) !!}</td>
                <td class="col-2 text-center">{{$report_row->W15_time_start}} - {{$report_row->W15_time_end}}</td>
                <td class="col-2 text-center">{{$report_row->W15_ref}}</td>
              </tr>
              @else
              @endif

            </tbody>
          </table>

          {{-- <form method="post" action="{{asset('report').'/'.$report_row->id}}">
            {{method_field('PUT')}}

            @csrf

            <div class="col-8 row mx-auto my-2">
              <div class="col-4 px-0">
                <button id="btn-edit{{$report_row->id}}" type="button" class="btn btn-success">แก้ไข</button>

                <button id="btn-submit{{$report_row->id}}" class="btn btn-primary " style="display: none;" name="create" type="submit" value="บันทึกข้อมูล">ยืนยัน</button>
                <a id="btn-cancel{{$report_row->id}}" class="btn btn-danger " style="display: none;" href="{{asset('/rejectReport')}}">ยกเลิก</a>
              </div>
              <div class="col-8 px-0">
                <select class="custom-select mr-sm-2 model-edit{{$report_row->id}}" id="inlineFormCustomSelect" disabled name="Work_status">
                  <option hidden>{{$report_row->Work_status}}</option>
                  <option value="Approved">Approved</option>
                  <option value="Pending">Pending</option>
                  <option value="reject">reject</option>
                </select>
              </div>
            </div>

            <div class="col-8 mx-auto mb-2">
              <div class="col-12 px-0">comment</div>
              <textarea class="form-control model-edit{{$report_row->id}}" id="message" rows="2" name="comment" disabled>{{$report_row->cm}}</textarea>
            </div>
          </form> --}}

        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@foreach($rejectReport as $report_row)
<script>
  $(document).ready(function() {
    $("#btn-edit{{$report_row->id}}").click(function() {
      $("#btn-submit{{$report_row->id}}").show();
      $("#btn-edit{{$report_row->id}}").hide();
      $("#btn-cancel{{$report_row->id}}").show();
      $('.model-edit{{$report_row->id}}').prop('disabled', false);
    });
    $("#btn-cancel{{$report_row->id}}").click(function() {
      $("#btn-edit{{$report_row->id}}").show();
      $("#btn-submit{{$report_row->id}}").hide();
      $("#btn-cancel{{$report_row->id}}").hide();
      $('.model-edit{{$report_row->id}}').prop('disabled', true);
    });
  });
</script>
@endforeach

@foreach($resentReport as $resentReport_row)
<script>
  $(document).ready(function() {
    $("#btn-edit{{$resentReport_row->id}}").click(function() {
      $("#btn-submit{{$resentReport_row->id}}").show();
      $("#btn-edit{{$resentReport_row->id}}").hide();
      $("#btn-cancel{{$resentReport_row->id}}").show();
      $('.model-edit{{$resentReport_row->id}}').prop('disabled', false);
    });
    $("#btn-cancel{{$resentReport_row->id}}").click(function() {
      $("#btn-edit{{$resentReport_row->id}}").show();
      $("#btn-submit{{$resentReport_row->id}}").hide();
      $("#btn-cancel{{$resentReport_row->id}}").hide();
      $('.model-edit{{$resentReport_row->id}}').prop('disabled', true);
    });
  });
</script>
@endforeach


<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if (exist) {
    alert(msg);
  }
</script>
<script>
$(document).ready(function(){
  $("#searchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#reportTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection
