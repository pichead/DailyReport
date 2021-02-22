@extends('layouts.admin')


@section('style')
<link rel="stylesheet" href="{{asset('others/chosen/chosen.css')}}">

@endsection

@section('content')


<div class="container">
    <div class="col-12 mx-auto">
      <div class="row">
        <div class="h4 col-6">Work List</div>
        <div class="col-6 d-flex justify-content-end">
          <a class="btn btn-primary" type="button" href="{{asset('/work/create')}}" >สร้างงาน</a>
        </div>
      </div>
      <br>
      <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่องาน</th>
                <th>วันที่สร้างงาน</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($works as $work)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$work->name}}</td>
                <td>{{DateTime::createFromFormat('Y-m-d H:i:s', $work->created_at)->format('d/m/Y')}}</td>
                <td>
                  <a type="button" class="btn-sm btn-info" href="{{asset('/work/view/'.$work->id)}}" >ดูรายละเอียด</a>
                  <a type="button" class="btn-sm btn-warning" style="color: white" href="{{asset('/work/edit/'.$work->id)}}" >แก้ไข</a>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    </div>
  
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
