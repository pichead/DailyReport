@extends('layouts.web')

@section('content')

<div class="col-10 mx-auto">
  <h3 class="mx-auto text-center">สร้างสินค้า</h3>
  <br>
  <div class="mx-auto col-5 border border-secondary">
    <form class="my-4 mx-5">
      <div class="form-group">
        <div class="col-12 p-0">ชื่อสินค้า</div>
        <input class="col-12 p-0" type="text">
      </div>
      <div class="row m-0">
        <div class="form-group col p-0 mr-2">
          <div class="col-12 p-0">ราคาต้นทุน</div>
          <input class="col-12 p-0" type="text">
        </div>
        <div class="form-group col p-0 ml-2">
          <div class="col-12 p-0">ราคาขาย</div>
          <input class="col-12 p-0" type="text">
        </div>
      </div>
      <div class="row m-0">
        <div class="form-group col p-0 mr-2">
          <div class="col-12 p-0">หน่วยรับ</div>
          <input class="col-12 p-0" type="text">
        </div>
        <div class="form-group col p-0 ml-2">
          <div class="col-12 p-0">หน่วยขาย</div>
          <input class="col-12 p-0" type="text">
        </div>
      </div>

      <div class="row col-10 mx-auto">
        <div class="btn btn-primary mx-auto col-4">บันทึก</div>
        <div class="btn btn-danger mx-auto col-4">ยกเลิก</div>
      </div>
    </form>
  </div>
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
