@extends('layouts.web')

@section('content')

<div class="col-12">


<h2>{{$data->title}}</h2>
<h3>{{$data->description}}</h3>
<p>
  <iframe src="{{url('uploads/'.$data->file)}}" style="width: 600px; height:600px;"></iframe>
</p>
</div>



















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
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
