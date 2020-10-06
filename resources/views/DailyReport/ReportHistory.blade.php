@extends('layouts.web')

@section('content')
<div class="col-12">
  <div class="col-12 col-md-10 col-lg-8 mx-auto">
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ชนิดงาน</th>
                    <th>วันที่ทำงาน</th>
                    <th>สถานะรายงาน</th>
                    <th>action</th>

                </tr>
            </thead>
            <tbody>
              @foreach($report as $report_row)
                <tr>
                    <th>{{$loop->index + 1}}</th>
                    <td>{{$report_row->Work_type}}</td>
                    <td>{{$report_row->WorkDate->format('d-m-Y')}}</td>
                    <td>{{$report_row->Work_status}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
  </div>
</div>




@endsection
