@extends('layouts.web')

@section('content')
<div class=" mt-5">
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

                            {{ __('You are human! if you have problem just tell superman(Ext.17)') }}

                        </div>

                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">News
                        </div>

                        <div class="card-body">
                            <div>ขณะนี้สามารถใช้งาน daily report ได้แล้วนะครับ(สูงสุดถึง 15 งานต่อวัน!!!)</div>
                            <br>
                            <div class="h4">สร้างรายงาน</div>
                            <ul>
                                <li>ใช้สำหรับสร้างรายงาน daily report (สร้างฉบับร่างไว้ก่อนได้ แต่ต้องทำการใส่วันที่ก่อน)</li>
                                <li>เมื่อสร้างรายงานแล้วรายงานจะไปอยู่ในหน้า"ฉบับร่างรายงาน" ต้องทำการส่งในหน้า"ฉบับร่างรายงาน"ถึงจะเป็นการส่งรายงานไปถึงหัวหน้างาน </li>
                                <li>สามารถอัพโหลดไฟล์ได้ในหน้านี้ได้เลย หรือจะอัพโหลดไฟล์ทีหลังก็ได้</li>
                                <li>ในหัวข้อ"ชนิดงาน" หากทำงานปกติในช่วงเวลาทำงานเลือก "daily report" ถ้าเป็นการทำ OT ให้เลือก "ล่วงเวลา OT" ดั้งนั้นหากทำ OT วันนั้นด้วยต้องเขียนรายงานแยกกัน 2 ฉบับ</li>
                                <li>ในการเขียนรายละเอียดของงานหากมีผลสรุปให้เขียนสรุปผลการทำงานต่อจากรายละเอียดของการทำงานในช่องเดียวกันได้เลย</li>
                                <li>ในช่องเวลาและผู้มอบหมาย สามารถกรอกหรือไม่กรอกก็ได้ ตามความเหมาะสมของงาน</li>
                            </ul>
                            <br>
                            <div class="h4">ฉบับร่างรายงาน</div>
                            <ul>
                                <li>สามารถอัพเดตงานและเพิ่มไฟล์ในหน้านี้ได้ แต่จะไม่สามารถแก้ไขวันที่ได้</li>
                                <li>เมื่อทำการแก้ไขรายละเอียดการทำงานให้ทำการกดปุ่ม "update" หากไม่ update ข้อมูลใหม่จะไม่ถูกบันทึกทับไป</li>
                                <li>สามารถลบหรือส่งรายงานในหน้านี้ได้ เมื่อส่งแล้ว รายงานฉบับนี้จะย้ายไปหน้า"ประวัติรายงาน"</li>
                                <li>เมื่อทำรายงานเสร็จแล้ว อย่าลืมส่งเพราะลำดับรายงานจะอ้างอิงจากเวลาที่กดส่งรายงาน เช่น หากส่งรายงานของวันที่19ไปแล้ว แต่ลืมส่งของวันที่16 จึงมาส่งวันที่19แทน ฝั่งหัวหน้างานก็จะเห็นว่ารายงานวันที่16เพิ่งถูกส่งมาย้อนหลัง</li>
                            </ul>
                            <br>
                            <div class="h4">ประวัติรายงาน</div>
                            <ul>
                                <li>ในหน้านี้จะไม่สามารถแก้ไขรายงานและลบรายงานออกได้แล้ว</li>
                                <li>หากมี comment จากหัวหน้างาน จะมีเครื่องหมาย * ต่อจากสถานะรายงานฉบับนั้น</li>

                            </ul>
                            <div class="h4">ต้องการการแก้ไข</div>
                            <ul>
                                <li>กรณีที่มีรายงานถูก reject มาจะทำให้รายงานนั้นเข้ามาในหน้านี้</li>
                                <li>การแก้ไขจะเหมือนกับการ update report ก่อนที่จะส่ง </li>
                                <li>รายงานที่แก้ไขและถูกส่งกลับไปใหม่ จะมีการนับวันที่ตามครั้งแรกที่ส่ง ไม่มีผลต่อการส่งรายงานล่าช้า</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
              <div class="col-12 row pb-2">
                <div class="col-md-10 mb-2">
                    <div class="card">
                        <div class="card-header ">งานที่ได้รับมอบหมาย</div>
                        <div class="card-body">
                            @if(count($work_tags)==0){
                                <div class="text-center">
                                    ยังไม่มีงานที่ได้รับมอบหมาย
                                </div>
                            }
                            @endif
                            @foreach($work_tags as $work_tag)
                                @php 
                                    $work = App\Models\Work::where('id',$work_tag->work_id)->where('visible',1)->first();
                                @endphp
                                @if(isset($work->id))
                                <div class="row">
                                    <div class="col">
                                        <a href="{{asset('/work/view/'.$work->id)}}" >{{$work->name}}</a>
                                    </div>
                                    <div class="col">
                                        {{$work->start_date->format('d-m-Y')}} - {{$work->end_date->format('d-m-Y')}}
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
                <br>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header ">ฉบับร่างรายงาน</div>

                        <div class="card-body text-center">
                            <div class="h5">{{$countdraft}}</div>
                        </div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header ">ส่งแล้ว</div>

                        <div class="card-body text-center">
                            <div class="h5">{{$countsent}}</div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-12 row pb-2">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header ">รอการแก้ไข</div>

                        <div class="card-body text-center">
                            <div class="h5">{{$countreject}}</div>
                        </div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header ">แก้ไขแล้ว</div>

                        <div class="card-body text-center">
                            <div class="h5">{{$countresent}}</div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
