@extends('layouts.admin')

@section('content')
<div class="mt-5">
    <div class="row justify-content-center">
      <div class="col-12 row">
        <div class="col-7">
          <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are Superman!') }}
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">News</div>

                <div class="card-body">
                    <div>ขณะนี้สามารถใช้งาน daily report ได้แล้วนะครับ (ลำดับของรายงานจะเรียงตามเวลาส่งรายงานโดยล่าสุดจะอยู่ข้างบน)</div>
                    <br>
                    <div class="h4">ดูรายงาน</div>
                    <ul>
                        <li>สามารถดูรายงาน daily report ได้ในหน้าดูรายงาน</li>
                        <li>ไฟล์แนบที่แนบมากับรายงานต้อง download ก่อนถึงจะเปิดไฟล์ได้</li>
                        <li>หากต้องการเปลี่ยนแปลงสถานะรายงานต้องทำการกดที่ "แก้ไข" เมื่อทำการแก้ไขหรือ comment แล้วต้องกดยืนยันเพื่อบันทึกข้อมูลทุกครั้งเพื่อ update</li>
                    </ul>
                    <br>
                    <div class="h4">รอการแก้ไขรายงาน</div>
                    <ul>
                        <li>รายงานที่ถูก reject กลับไปให้แก้ไขรายงานเพิ่มเติมให้สมบูรณ์จะมาอยู่ในหน้านี้</li>
                        <li>ในหน้านี้จะแบ่งเป็น 2 ส่วน คือ resent report ส่วนนีจะแสดงรายงานที่ถูกแก้ไขกลับมาแล้ว และอีกส่วนคือ reject report ส่วนนี้จะแสดงรายงานที่ถูก reject กลับไปให้แก้ไขใหม่</li>
                        <li>การ reject สามารถยกเลิก(กลับไป pending หรือ approved) หรือ reject รายงานซ้ำได้</li>
                        <li>*หาก reject รายงานควรจะทำการ comment เพื่อบอกถึงส่วนที่ต้องการแก้ไขในรายงาน เพื่อให้ผู้เขียนรายงานแก้ไขได้อย่างครบถ้วน</li>
                    </ul>

                </div>
            </div>
          </div>
        </div>
        <div class="col-5">
          <div class="col-12 row pb-2">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">รอการ approved</div>

                    <div class="card-body text-center">
                        <div class="h5">{{$pendingCount}}</div>
                    </div>

                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">รายงานทั้งหมด</div>

                    <div class="card-body text-center">
                        <div class="h5">{{$reportCount}}</div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-12 row pb-2">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header ">รอการแก้ไข</div>

                    <div class="card-body text-center">
                        <div class="h5">{{$rejectCount}}</div>
                    </div>

                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header ">แก้ไขแล้ว</div>

                    <div class="card-body text-center">
                        <div class="h5">{{$sentCount}}</div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
