@extends('Citizens_img.layout')
   
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Show Product</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('citizens_img.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $CitizenImg->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Details:</strong> <br/>
                {{ $CitizenImg->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong><br/>
                <img src="{{ url('images/' . $CitizenImg->ktp) }}" alt="KTP" width="100px">
                <img src="{{ url('images/' . $CitizenImg->kk) }}" alt="KK" width="100px">
                <img src="{{ url('images/' . $CitizenImg->akta) }}" alt="Akta" width="100px">
                <img src="{{ url('images/' . $CitizenImg->kia) }}" alt="KIA" width="100px">
            </div>
        </div>
    </div>
  
  </div>
</div>
@endsection
