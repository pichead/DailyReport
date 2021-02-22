@extends('layouts.admin')


@section('style')
<link rel="stylesheet" href="{{asset('others/chosen/chosen.css')}}">

@endsection

@section('content')


<div class="container">
  <form method="POST" action="{{asset('workupdate/'.$work->id)}}" enctype="multipart/form-data">
    {{method_field('PUT')}}
    @csrf
    <div class="col-lg-10 mx-auto" style="background-color: ">
      <div class="h4">Work Assignment</div>
      <br>
      <div class="form-group">
        <label class="">เรื่อง</label>
        <div class="">
          <input type="text" name="name" class="form-control" value="{{$work->name}}">
        </div>
      </div>
      <div class="form-group">
        <label class="">รายละเอียด</label>
        <div class="">
          <textarea type="text" name="detail" class="form-control" placeholder="รายละเอียดงาน" rows="3">{{$work->detail}}</textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <div class="form-group">
            <label class="">เริ่ม</label>
            <div class="">
              <input type="date" class="form-control" name="start_date" value="{{$work->start_date->format('Y-m-d')}}" />
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label class="">สิ้นสุด</label>
            <div class="">
              <input type="date" class="form-control" name="end_date" value="{{$work->end_date->format('Y-m-d')}}" />
            </div>
          </div>
        </div>
    </div>
      <div class="form-group">
        <label class="">ผู้ดำเนินงาน</label>
        @php
          $user =  App\Models\User::whereIn('type',array(1,0))->get();
          $report_tags = App\Models\WorkAssignment::where('work_id',$id)->get();
          $array_tag = [];
          foreach($report_tags as $report_tag){
            array_push($array_tag,$report_tag->user_id);
          }
        @endphp

        <select name="tag[]"  id="usertag" data-placeholder="Tag..." multiple class="py-2 form-control chosen-select" >
          @foreach ($user as $user_row)
            @if (in_array("$user_row->id", $array_tag))
              <option value="{{$user_row->id}}" selected>{{$user_row->name}}</option>
            @else 
              <option value="{{$user_row->id}}">{{$user_row->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="file">ไฟล์แนบ</label>
        <br>
        @foreach($fileName as $file_row)
          <a href="{{asset('/uploads').'/'.$file_row->name.'/'}}">{{$file_row->name}}</a>
          <br>
        @endforeach
        <input type="file" id="file" name="file[]" class="form-control-file" multiple>
      </div>

        <button type="submit" value="{{$work->id}}" class="d-flex justify-content-center col-lg-2 mx-auto btn btn-primary">อัพเดต</button>
    </div>
  
  </form>
</div>



@endsection


@section('script')

<script>
  $("#usertag").chosen({
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
