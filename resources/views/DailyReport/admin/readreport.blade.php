@extends('layouts.admin')

@section('content')
@csrf
<form method="POST"  action="{{asset('reportupdate/'.$report->id)}}" enctype="multipart/form-data">
    {{method_field('PUT')}}
    @csrf
    <div class="col-11 d-flex row-hl mx-auto">

        <div class="col-8">
                <h3>{{$user->name}}</h3>
                <br>
                <h4>ประจำวันที่ : {{$report->WorkDate->format('d-m-Y')}}</h4>
                <br>
                @foreach($fileName as $file_row)
                    <a target="_blank" href="{{asset('/report_app/public/uploads').'/'.$file_row->file.'/'}}">{{$file_row->file}}</a>
                    <br>
                @endforeach
                <table class="table table-striped col-12 mx-auto" style="border-bottom: solid 1px;">
                    <thead>
                            <tr class="row mx-auto">
                                <th class="col-1 text-center">No.</th>
                                <th class="col-5">รายการงาน</th>
                                <th class="col-3 text-center">เวลาที่ทำงาน</th>
                                <th class="col-3 text-center">ผู้มอบหมาย</th>
                            </tr>
                    </thead>

                        <tbody >

                            @if(isset($report->Work1))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">1</td>
                            <td class="col-5">{!! nl2br(e($report->Work1)) !!}</td>
                            <td class="col-3 text-center">{{$report->W1_time_start}} - {{$report->W1_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W1_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work2))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">2</td>
                            <td class="col-5">{!! nl2br(e($report->Work2)) !!}</td>
                            <td class="col-3 text-center">{{$report->W2_time_start}} - {{$report->W2_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W2_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work3))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">3</td>
                            <td class="col-5">{!! nl2br(e($report->Work3)) !!}</td>
                            <td class="col-3 text-center">{{$report->W3_time_start}} - {{$report->W3_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W3_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work4))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">4</td>
                            <td class="col-5">{!! nl2br(e($report->Work4)) !!}</td>
                            <td class="col-3 text-center">{{$report->W4_time_start}} - {{$report->W4_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W4_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work5))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">5</td>
                            <td class="col-5">{!! nl2br(e($report->Work5)) !!}</td>
                            <td class="col-3 text-center">{{$report->W5_time_start}} - {{$report->W5_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W5_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work6))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">6</td>
                            <td class="col-5">{!! nl2br(e($report->Work6)) !!}</td>
                            <td class="col-3 text-center">{{$report->W6_time_start}} - {{$report->W6_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W6_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work7))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">7</td>
                            <td class="col-5">{!! nl2br(e($report->Work7)) !!}</td>
                            <td class="col-3 text-center">{{$report->W7_time_start}} - {{$report->W7_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W7_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work8))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">8</td>
                            <td class="col-5">{!! nl2br(e($report->Work8)) !!}</td>
                            <td class="col-3 text-center">{{$report->W8_time_start}} - {{$report->W8_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W8_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work9))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">9</td>
                            <td class="col-5">{!! nl2br(e($report->Work9)) !!}</td>
                            <td class="col-3 text-center">{{$report->W9_time_start}} - {{$report->W9_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W9_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work10))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">10</td>
                            <td class="col-5">{!! nl2br(e($report->Work10)) !!}</td>
                            <td class="col-3 text-center">{{$report->W10_time_start}} - {{$report->W10_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W10_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work11))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">11</td>
                            <td class="col-5">{!! nl2br(e($report->Work11)) !!}</td>
                            <td class="col-3 text-center">{{$report->W11_time_start}} - {{$report->W11_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W11_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work12))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">12</td>
                            <td class="col-5">{!! nl2br(e($report->Work12)) !!}</td>
                            <td class="col-3 text-center">{{$report->W12_time_start}} - {{$report->W12_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W12_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work13))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">13</td>
                            <td class="col-5">{!! nl2br(e($report->Work13)) !!}</td>
                            <td class="col-3 text-center">{{$report->W13_time_start}} - {{$report->W13_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W13_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work14))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">14</td>
                            <td class="col-5">{!! nl2br(e($report->Work14)) !!}</td>
                            <td class="col-3 text-center">{{$report->W14_time_start}} - {{$report->W14_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W14_ref}}</td>
                            </tr>
                            @else
                            @endif
                            @if(isset($report->Work15))
                            <tr class="row mx-auto">
                            <td class="col-1 text-center">15</td>
                            <td class="col-5">{!! nl2br(e($report->Work15)) !!}</td>
                            <td class="col-3 text-center">{{$report->W15_time_start}} - {{$report->W15_time_end}}</td>
                            <td class="col-3 text-center">{{$report->W15_ref}}</td>
                            </tr>
                            @else
                            @endif

                        </tbody>
                </table>

                {{-- ยกเลิก comment แบบเดิม --}}
                {{-- @if(isset($report->cm))

                <div class="col-10 my-3 mxauto">
                    <h5>Comment</h5>
                    {{$report->cm}}
                </div>
                @else
                @endif --}}

            
        </div>
        
        <div class="col-4 " style="margin-top:100px" >
            <div class="h4  mt-4">สถานะ</div>
            <select class="custom-select mr-sm-2 model-edit{{$report->id}}" id="inlineFormCustomSelect" name="Work_status">
                <option hidden>{{$report->Work_status}}</option>
                <option value="Approved">Approved</option>
                <option value="Pending">Pending</option>
                <option value="reject">reject</option>
            </select>

            <div class="px-5 mt-3 align-self-baseline  border rounded" style="background-color: white; ">
                <div class="h4 text-center mt-4">Comment</div>
                @if(isset($comments[0]))
                @foreach($comments as $comment)
                    @if($comment->cm_user_id == $user->id)
                    <div class="row">
                        <div class=" col-6 border rounded" style="background-color: rgb(113, 188, 238)">{{$comment->cm}}</div>
                        <div class="col-6"></div>

                    </div>
                    @else
                    <div class="row ">
                        <div class="col-6"></div>
                        <div class="d-flex justify-content-end col-6 border rounded" style="background-color: yellowgreen">{{$comment->cm}}</div>
                    </div>
                    @endif
                <br>
                @endforeach
                @else 
                        <div class="text-center ">ไม่มี comment</div>
                @endif
                <div class="form-row my-4">
                    <div class="col">
                        <textarea type="text" name="comment" class="form-control" placeholder="Comment" rows="1"></textarea>
                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class=" btn btn-info mt-4" type="submit">บันทึกข้อมูล</button>
            </div>
        </div>

    </div>
</form>




@endsection

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>