@extends('layouts.web')

@section('content')

<div class="col-12">

  <form method="POST" action="{{asset('create')}}" enctype="multipart/form-data">

    @csrf
            <!-- TEXT FIELD GROUPS -->
            <div class="form-row mx-auto col-12 col-md-9 px-0 px-auto">
              <div class="form-group col-6 col-sm mx-auto">
                  <label for="name">ชนิดงาน</label>
                  <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Work_type">
                    <option selected value="Daily">Daily Report</option>
                    <option value="OT">ล่วงเวลา(OT)</option>
                  </select>
              </div>

              <div class="form-group col-6 col-sm mx-auto">
                  <label for="name">ชื่อ-นามสกุล</label>
                  <input class="form-control" type="text"  value="{{ Auth::user()->name }}">
              </div>
              <input class="form-control" style="display:none;" name="id" value="{{ Auth::user()->id }}">
              <input class="form-control" style="display:none;" type="text" name="Work_status" value="Pending">
              <div class="form-group col mx-auto">
                  <label for="date">วันที่ทำงาน</label>
                  <input class="form-control" type="date" name="WorkDate" value="" required>
              </div>
            </div>

            <div class="form-row mx-auto col-12 col-md-9 px-0 px-auto">
                <label for="file">Upload file</label>
                <input type="file" name="file[]" class="form-control-file" multiple>
            </div>



            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 1</label>
              </div>
              
              <div class="form-group col-12 mx-auto">

                  <textarea class="form-control" id="message" name="Work1" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W1_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W1_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W1_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 2</label>

              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work2" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W2_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W2_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W2_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>              
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 3</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work3" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W3_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W3_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W3_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 4</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work4" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W4_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W4_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W4_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 5</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work5" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W5_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W5_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W5_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w10" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 6</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work6" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W6_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W6_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W6_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w10" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 7</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work7" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W7_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W7_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W7_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w10" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 8</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work8" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W8_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W8_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W8_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w10" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 9</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work9" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W9_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W9_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W9_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w10" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 10</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work10" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W10_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W10_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W10_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w15" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 11</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work11" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W11_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W11_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W11_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w15" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 12</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work12" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W12_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W12_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W12_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w15" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 13</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work13" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W13_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W13_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W13_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w15" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 14</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work14" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W14_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W14_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W14_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>
            <div class="form-row col-12 col-md-9 mx-auto py-3 px-0 w15" style="display:none;">
              <div class="form-group col-12 mx-auto">
                  <label>งานที่ 15</label>
              </div>
              <div class="form-group col-12 mx-auto">
                  <textarea class="form-control" id="message" name="Work15" rows="5"></textarea>
              </div>
              <div class="form-group col-12 mx-auto p-0">
                <div class="form-row mx-auto">
                  <div class="form-group col-6 col-md-3 row mx-auto mr-3">
                    <label class="col-4 col-md-5 p-0">เวลาเริ่ม</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W15_time_start"></input>
                  </div>
                  <div class="form-group col-6 col-md-3 row mx-auto  pr-2  ">
                    <label class="col-4 col-md-5 p-0">สิ้นสุด</label>
                    <input class="col-8 col-md-7 p-0 form-control" type="text" name="W15_time_end"></input>
                  </div>
                  <div class="form-group col-12 col-md mx-auto ml-md-4">
                  <input class="form-control" name="W15_ref" placeholder="ผู้มอบหมายงาน"></input>
                </div>
                </div>
                
              </div>
            </div>


            <div class="form-group mx-auto col-10">
                <div class="row mx-auto col-12 col-md-6 col-lg-4">
                  <a class="btn btn-primary col-md-5 col-5" data-toggle="modal" data-target="#myModal">บันทึก</a>
                  <div class="modal fade" id="myModal" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">ยืนยันการบันทึกข้อมูล</h4>
                          <button class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                          <h5>ตรวจสอบข้อมูลให้เรียบร้อยก่อนกดยืนยัน</h5>
                          <h5 style="color: red;">เมื่อทำการยืนยันแล้วจะไม่สามารถแก้ไขข้อมูลได้</h5>
                          <br>
                          <p>กดปุ่ม "ยืนยัน" เพื่อบันทึกข้อมูล</p>
                          <p>กดปุ่ม "ยกเลิก" เพื่อแก้ไขข้อมูล</p>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" name="create" type="submit" value="บันทึกข้อมูล">ยืนยัน</button>
                          <button class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a id="w10" class="btn btn-success col-md-5 col-5 ml-4">เพิ่มงาน</a>
                  <a id="w15" class="btn btn-success col-md-5 col-5 ml-4" style="display: none;">เพิ่มงาน</a>
                </div>
            </div>
        </form>

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
<!-- <script>
  $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });
</script> -->
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@endsection
