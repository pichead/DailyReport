@extends('layouts.web')

@section('content')

<body>
  <div class="col-8 mx-auto">
    <h3>สรุปรายการสินค้า</h3>
    <br>

    <div class="border border-secondary">
      <div class="row mx-3 p-2"> 
        <div class="col-4 my-auto">1.Vitamin A</div>
        <div class="col-2 my-auto row mx-0">
          <div class="col-6 px-0">จำนวน</div>
          <div class="border px-0 border-secondary col-6 text-center">2</div>
        </div>
        <div class="col-4 my-auto text-center">ราคา 2000 บาท</div>
        <button class="col-2  btn btn-danger" type="button"> Remove</button>
      </div>
      <div class="row mx-3 p-2"> 
        <div class="col-4 my-auto">2.Vitamin B</div>
        <div class="col-2 my-auto row mx-0">
          <div class="col-6 px-0">จำนวน</div>
          <div class="border px-0 border-secondary col-6 text-center">2</div>
        </div>
        <div class="col-4 my-auto text-center">ราคา 2000 บาท</div>
        <button class="col-2  btn btn-danger" type="button"> Remove</button>
      </div>
      <div class="row mx-3 p-2"> 
        <div class="col-4 my-auto">3.Vitamin C</div>
        <div class="col-2 my-auto row mx-0">
          <div class="col-6 px-0">จำนวน</div>
          <div class="border px-0 border-secondary col-6 text-center">2</div>
        </div>
        <div class="col-4 my-auto text-center">ราคา 2000 บาท</div>
        <button class="col-2  btn btn-danger" type="button"> Remove</button>
      </div>
      <div class="py-2 clearfix" style="background-color: aqua">
        <div class="col-12 p-0 float-right">ราคารวมทั้งหมด 8000 บาท</div>
      </div>
    </div>
    <div>*** กรุณาชำระเงินไปที่ เลขบัญชี 557-87557-74 ธนาคารกสิกรไทย นางสาวกชกช โขอออนัน</div>
    <div class="row m-0">
      <div class="mx-auto row">
        <div class="btn btn-primary mx-2" type="btn">บันทึก</div>
        <div class="btn btn-danger mx-2" type="btn">ยกเลิก</div>
      </div>
    </div>


  </div>
</body>
@endsection
