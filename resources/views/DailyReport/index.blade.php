@extends('layouts.app')

@section('content')
<div class="col-12">
  <div class="col-12 col-md-8 col-lg-6 mx-auto">
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>รายงานประจำวัน</th>
                    <th>วันที่ทำงาน</th>

                </tr>
            </thead>
            <tbody>
              @foreach($report as $report_row)
                <tr class="" data-toggle="modal" data-target="#No{{$report_row->ID}}">
                    <th>{{$loop->index + 1}}</th>
                    <td>{{$report_row->Name}}</td>
                    <td>{{$report_row->workDate->format('d-m-Y')}}</td>
                </tr>



                <div class="modal" id="No{{$report_row->ID}}" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">{{$report_row->Name}}</h5>
                            <h5 class="modal-title">{{$report_row->workDate->format('d-m-Y')}}</h5>
                            <button class="close" data-dismiss="modal">×</button>
                          </div>
                          <div class="modal-body">
                            <form>
                                <div class="form-row mx-auto col-6">
                                  <div class="form-group col mx-auto">
                                      {{$report_row->Work1}}
                                  </div>
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-primary" data-dismiss="modal">Login</button>
                          </div>
                        </div>
                      </div>
                    </div>

                @endforeach
            </tbody>
        </table>
  </div>
</div>

@endsection
