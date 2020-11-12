@extends('layouts.web')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are human!') }}
                    
                </div>


                            <!-- <form action="{{asset('store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-row col-6">
                                    <input type="file" id="file" name="file[]" class="form-control-file" multiple>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control">
                                </div>
                            </form> -->



            </div>  
        </div>
        
    </div>
</div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
@endsection
