@extends('layouts.app')

@section('content')

<div class="col-12">
  <form method="POST" action="{{asset('create')}}">
    @csrf
            <!-- TEXT FIELD GROUPS -->
            <div class="form-row mx-auto col-6">
              <div class="form-group col mx-auto">
                  <label for="name">ชื่อ-นามสกุล</label>
                  <input class="form-control" type="text" name="Name" value="{{ Auth::user()->name }}">
              </div>

              <div class="form-group col mx-auto">
                  <label for="date">วันที่ทำงาน</label>
                  <input class="form-control" type="date" name="WorkDate" value="">
              </div>
            </div>

            <div class="form-group col-6 mx-auto">
                <label>งานที่ 1</label>
                <textarea class="form-control" id="message" name="Work1" rows="3"></textarea>
            </div>
            <div class="form-group col-6 mx-auto">
                <label>งานที่ 2</label>
                <textarea class="form-control" id="message"  name="Work2" rows="3"></textarea>
            </div>
            <div class="form-group col-6 mx-auto">
                <label>งานที่ 3</label>
                <textarea class="form-control" id="message" name="Work3"  rows="3"></textarea>
            </div>
            <div class="form-group col-6 mx-auto">
                <label>งานที่ 4</label>
                <textarea class="form-control" id="message"  name="Work4" rows="3"></textarea>
            </div>
            <div class="form-group col-6 mx-auto">
                <label>งานที่ 5 </label>
                <textarea class="form-control" id="message"  name="Work5" rows="3"></textarea>
            </div>
            <div class="form-group col-6 mx-auto">
                <label>งานที่ 6 </label>
                <textarea class="form-control" id="message"  name="Work6" rows="3"></textarea>
            </div>
            <div class="form-row mx-auto col-6">

                <div class="form-group col">
                  <input class="btn btn-primary col-3" name="create" type="submit" value="บันทึกข้อมูล">
                  <input class="btn btn-danger col-3" type="" value="ยกเลิก">
                </div>


            </div>
        </form>
</div>
@endsection
