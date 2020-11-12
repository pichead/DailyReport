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
          <th></th>

        </tr>
      </thead>
      <tbody>
        @foreach($report as $report_row)
        <tr>
          <th data-toggle="modal" data-target="#No{{$report_row->id}}">{{$loop->index + 1}}</th>
          <td data-toggle="modal" data-target="#No{{$report_row->id}}">{{$report_row->Work_type}}</td>
          <td data-toggle="modal" data-target="#No{{$report_row->id}}">{{$report_row->WorkDate->format('d-m-Y')}}</td>
          <td><button class="mr-3 btn btn-primary" data-toggle="modal" data-target="#sentReport{{$report_row->id}}">ส่งรายงานนี้</button><button class="btn btn-danger" data-toggle="modal" data-target="#delReport{{$report_row->id}}">ลบรายงาน</button></td>
        </tr>


        @endforeach

        <!-- sent modal -->
        @foreach($report as $report_row)
        <div class="modal" id="sentReport{{$report_row->id}}" style="display: none;" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">ส่งรายงาน</h5>
                <button class="close" data-dismiss="modal">×</button>
              </div>
              <div class="modal-body">
                <h5>ต้องการส่งรายงานประจำวันที่ : {{$report_row->WorkDate->format('d-m-Y')}} หรือไม่</h5>
                <p>กดปุ่ม "ส่ง" เพื่อส่งรายงานนี้</p>
                <p>กดปุ่ม "ยกเลิก" เพื่อกลับ</p>
                <h5 style="color: red;">เมื่อทำการส่งแล้วจะไม่สามารถแก้ไขข้อมูลได้</h5>

              </div>
              <div class="modal-footer">
                <a class="btn btn-primary" href="{{asset('/sentReport/report').'/'.$report_row->id.'/'}}">ส่ง</a>
                <button class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

              </div>
            </div>
          </div>

        </div>
        @endforeach
        <!-- end sent modal -->

        <!-- Del modal -->
        @foreach($report as $report_row)
        <div class="modal" id="delReport{{$report_row->id}}" style="display: none;" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">ลบรายงาน</h5>
                <button class="close" data-dismiss="modal">×</button>
              </div>
              <div class="modal-body">
                <h5>ต้องการลบรายงานประจำวันที่ : {{$report_row->WorkDate->format('d-m-Y')}} หรือไม่</h5>
                <p>กดปุ่ม "ลบ" เพื่อลบรายงานนี้</p>
                <p>กดปุ่ม "ยกเลิก" เพื่อกลับ</p>
                <h5 style="color: red;">เมื่อทำการลบแล้วจะไม่สามารถแก้ไขข้อมูลได้</h5>

              </div>
              <div class="modal-footer">
                <a class="btn btn-danger" href="{{asset('/delReport/report').'/'.$report_row->id.'/'}}">ลบ</a>
                <button class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

              </div>
            </div>
          </div>

        </div>
        @endforeach
        <!-- end Del modal -->
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


          <div class="modal-body">
            <form method="post" action="{{asset('DarftUpdate').'/'.$report_row->id}}" enctype="multipart/form-data">
              {{method_field('PUT')}}

              @csrf

              <div class="form-row col-12 mx-auto">
                <div class="form-group col-6">
                  @foreach($fileName as $file_row)
                  @if($report_row->id==$file_row->report_id)
                  <a href="{{asset('/uploads').'/'.$file_row->file.'/'}}">{{$file_row->file}}</a>
                  <br>
                  @else
                  @endif
                  @endforeach
                </div>
                <div class="form-group">
                  <label for="file">Upload file</label>
                  <input type="file" name="file[]" class="form-control-file" multiple>
                </div>
                <div class="form-group">
                  <button class="ml-5 mb-3 btn btn-primary " name="create" type="submit" value="บันทึกข้อมูล">update</button>
                </div>
              </div>


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
                    <td class="col-7"><textarea class="form-control" name="Work1">{{$report_row->Work1}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W1_time_start" value="{{$report_row->W1_time_start}}"></input> - <input class="form-control" name="W1_time_end" value="{{$report_row->W1_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W1_ref" value="{{$report_row->W1_ref}}"></input></td>
                  </tr>
                  <tr class="row">
                    <td class="col-1 text-center">2</td>
                    <td class="col-7"><textarea class="form-control" name="Work2">{{$report_row->Work2}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W2_time_start" value="{{$report_row->W2_time_start}}"></input> - <input class="form-control" name="W2_time_end" value="{{$report_row->W2_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W2_ref" value="{{$report_row->W2_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">3</td>
                    <td class="col-7"><textarea class="form-control" name="Work3">{{$report_row->Work3}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W3_time_start" value="{{$report_row->W3_time_start}}"></input> - <input class="form-control" name="W3_time_end" value="{{$report_row->W3_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W3_ref" value="{{$report_row->W3_ref}}"></input></td>

                  <tr class="row">
                    <td class="col-1 text-center">4</td>
                    <td class="col-7"><textarea class="form-control" name="Work4">{{$report_row->Work4}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W4_time_start" value="{{$report_row->W4_time_start}}"></input> - <input class="form-control" name="W4_time_end" value="{{$report_row->W4_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W4_ref" value="{{$report_row->W4_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">5</td>
                    <td class="col-7"><textarea class="form-control" name="Work5">{{$report_row->Work5}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W5_time_start" value="{{$report_row->W5_time_start}}"></input> - <input class="form-control" name="W5_time_end" value="{{$report_row->W5_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W5_ref" value="{{$report_row->W5_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">6</td>
                    <td class="col-7"><textarea class="form-control" name="Work6">{{$report_row->Work6}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W6_time_start" value="{{$report_row->W6_time_start}}"></input> - <input class="form-control" name="W6_time_end" value="{{$report_row->W6_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W6_ref" value="{{$report_row->W6_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">7</td>
                    <td class="col-7"><textarea class="form-control" name="Work7">{{$report_row->Work7}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W7_time_start" value="{{$report_row->W7_time_start}}"></input> - <input class="form-control" name="W7_time_end" value="{{$report_row->W7_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W7_ref" value="{{$report_row->W7_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">8</td>
                    <td class="col-7"><textarea class="form-control" name="Work8">{{$report_row->Work8}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W8_time_start" value="{{$report_row->W8_time_start}}"></input> - <input class="form-control" name="W8_time_end" value="{{$report_row->W8_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W8_ref" value="{{$report_row->W8_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">9</td>
                    <td class="col-7"><textarea class="form-control" name="Work9">{{$report_row->Work9}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W9_time_start" value="{{$report_row->W9_time_start}}"></input> - <input class="form-control" name="W9_time_end" value="{{$report_row->W9_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W9_ref" value="{{$report_row->W9_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">10</td>
                    <td class="col-7"><textarea class="form-control" name="Work10">{{$report_row->Work10}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W10_time_start" value="{{$report_row->W10_time_start}}"></input> - <input class="form-control" name="W10_time_end" value="{{$report_row->W10_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W10_ref" value="{{$report_row->W10_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">11</td>
                    <td class="col-7"><textarea class="form-control" name="Work11">{{$report_row->Work11}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W11_time_start" value="{{$report_row->W11_time_start}}"></input> - <input class="form-control" name="W11_time_end" value="{{$report_row->W11_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W11_ref" value="{{$report_row->W11_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">12</td>
                    <td class="col-7"><textarea class="form-control" name="Work12">{{$report_row->Work12}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W12_time_start" value="{{$report_row->W12_time_start}}"></input> - <input class="form-control" name="W12_time_end" value="{{$report_row->W12_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W12_ref" value="{{$report_row->W12_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">13</td>
                    <td class="col-7"><textarea class="form-control" name="Work13">{{$report_row->Work13}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W13_time_start" value="{{$report_row->W13_time_start}}"></input> - <input class="form-control" name="W13_time_end" value="{{$report_row->W13_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W13_ref" value="{{$report_row->W13_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">14</td>
                    <td class="col-7"><textarea class="form-control" name="Work14">{{$report_row->Work14}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W14_time_start" value="{{$report_row->W14_time_start}}"></input> - <input class="form-control" name="W14_time_end" value="{{$report_row->W14_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W14_ref" value="{{$report_row->W14_ref}}"></input></td>
                  </tr>

                  <tr class="row">
                    <td class="col-1 text-center">15</td>
                    <td class="col-7"><textarea class="form-control" name="Work15">{{$report_row->Work15}}</textarea></td>
                    <td class="col-2 text-center"><input class="form-control" name="W15_time_start" value="{{$report_row->W15_time_start}}"></input> - <input class="form-control" name="W15_time_end" value="{{$report_row->W15_time_end}}"></input></td>
                    <td class="col-2 text-center"><input class="form-control" name="W15_ref" value="{{$report_row->W15_ref}}"></input></td>
                  </tr>


                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<script>
  var msg = '{{Session::get('
  alert ')}}';
  var exist = '{{Session::has('
  alert ')}}';
  if (exist) {
    alert(msg);
  }
</script>



@endsection