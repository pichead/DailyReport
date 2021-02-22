@extends('layouts.admin')


@section('style')
<link rel="stylesheet" href="{{asset('others/chosen/chosen.css')}}">

@endsection

@section('content')


<div class="container">  
  <form method="POST" class="col-12" action="{{asset('work/reporing/update')}}" enctype="multipart/form-data">

    @csrf
    <div class="mx-auto" style="background-color: ">
      <div class="h4">Work Assignment</div>
      <div class="row">
        <div class="col">
          
          <div class="form-group">
            <label class="">เรื่อง</label>
            <div class="">
              <div class="form-control" >{{$work->name}}</div>
            </div>
          </div>         
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label class="">เริ่ม</label>
                <div class="">
                  <div class="form-control" >{{$work->start_date->format('d-m-Y')}}</div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="">สิ้นสุด</label>
                <div class="">
                  <div class="form-control" >{{$work->end_date->format('d-m-Y')}}</div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="file">ไฟล์แนบ</label>
            <br>
            @if(count($fileName) == 0 )
              <div class="text-center">----- ยังไม่มีไฟล์แนบ -----</div>
            @endif
            @foreach($fileName as $file_row)
              <a target="_new" href="{{asset('/uploads').'/'.$file_row->name.'/'}}">{{$file_row->name}}</a>
              <br>
            @endforeach
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label class="">ผู้ดำเนินงาน</label>
            <table class="table ">
              <thead class="table-primary">
                  <tr>
                      <th>#</th>
                      <th>ผู้ได้รับมอบหมาย</th>
                  </tr>
              </thead>
              @php 
                $report_tag  = App\Models\WorkReport::where('work_id',$id)->get();
              @endphp
              <tbody class="table-light">
                  @foreach($users as $user)
                      @php 
                        $name = App\Models\User::where('id',$user->user_id)->first();
                      @endphp
                  <tr>
                      <th scope="row">{{$loop->index+1}}</th>
                      <td>{{$name->name}}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="">รายละเอียดงาน</label>
        <div class="p-2 border" style="background-color: white;" >
          {!! nl2br(e($work->detail)) !!}
        </div>
      </div>
      <div class="p-3" style="background-color: white">
        <div class="text-center">
        <span>ความคืบหน้า </span><span id="slidernumber" class="text-center">{{$work->progress}}</span><span> %<span>
        </div>
        <input class="custom-range" type="range" min="0" max="100" value="{{$work->progress}}" name="progress" id="discount_credits"/>
      </div>
      <br>
      <div>รายงานการทำงาน</div>
      <div class="rounded border-info p-3 overflow-auto" style="background-color: white;height:400px">
        @foreach($workreportings as $workreporting)
          @php
            $user = App\Models\User::where('id',$workreporting->user_id)->first();
          @endphp
        <div class="row col-12 mt-4">
          <div class="col-5">
            <span class="rounded bg-info text-white px-2">{{$user->name}}</span><span class="mx-3 text-black-50" style="font-size: 70%">18-2-2021<span>
          </div>
        </div>
        <div class="row col-12 mt-2">
          <div class="col-11">
            <div class="rounded bg-success text-white p-2">{!! nl2br(e($workreporting->reporting)) !!}</div>
          </div>
        </div>
        @endforeach
      </div>
      <input class="form-control my-2" type="text" name="work_text" placeholder="เพิ่มข้อมูล . . ." />
      <div class=" mb-3 mt-1 col-12 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary" name="work_id" value="{{$work->id}}">อัพเดตข้อมูล</button>
      </div>
      
    </div>
  </form>
</div>



@endsection


@section('script')

<script>
$(document).ready(function(){
  $("[type=range]").change(function(){
    var newval=$(this).val();
    $("#slidernumber").text(newval);
  });
});
</script>

<script>
  $("#user").chosen({
  // no_results_text: "no results",
  // search_contains: true,
  // allow_duplicates:true,
  width:'100%',
});

</script>

<script>
  $(document).ready(function(){
    $("#w10").click(function(){
      $(".w10").show();
      $("#w10").hide();
      $("#w15").show();
    });
    $("#w15").click(function(){
      $(".w15").show();
      $("#w15").hide();
    });
  });
</script>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@endsection
