@extends('layouts.admin')


@section('style')
<link rel="stylesheet" href="{{asset('others/chosen/chosen.css')}}">

@endsection

@section('content')


<div class="container">
  <form method="POST" action="{{asset('creatework')}}" enctype="multipart/form-data">

    @csrf
    <div class="col-lg-10 mx-auto" style="background-color: ">
      <div class="h4">Work Assignment</div>
      <br>
      <div class="form-group">
        <label class="">เรื่อง</label>
        <div class="">
          <input type="text" name="name" class="form-control" placeholder="หัวข้อ" required>
        </div>
      </div>
      <div class="form-group">
        <label class="">รายละเอียด</label>
        <div class="">
          <textarea type="text" name="detail" class="form-control" placeholder="รายละเอียดงาน" rows="3"required></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <div class="form-group">
            <label class="">เริ่ม</label>
            <div class="">
              <input type="date" name="start_date" class="form-control" required/>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label class="">สิ้นสุด</label>
            <div class="">
              <input type="date" name="end_date" class="form-control" required/>
            </div>
          </div>
        </div>
    </div>
      <div class="form-group">
        <label class="">ผู้ดำเนินงาน</label>
        @php
          $user =  App\Models\User::whereIn('type',array(1,0))->get();
        @endphp
        <select name="user[]" id="user" multiple class="form-control">
          @foreach ($user as $user_row)
          <option value="{{$user_row->id}}">{{$user_row->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="file">ไฟล์แนบ</label>
        <input type="file" id="file" name="file[]" class="form-control-file" multiple>
      </div>

        <button type="submit" class="d-flex justify-content-center col-lg-2 mx-auto btn btn-primary">สร้าง</button>
    </div>
  
  </form>
</div>



@endsection


@section('script')

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
