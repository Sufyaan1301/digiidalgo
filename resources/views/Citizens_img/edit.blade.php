@extends('Citizens_img.layout')
     
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Edit Product</h2>
  <div class="card-body">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('citizens_img.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    
    <form action="{{ route('citizens_img.update',$CitizenImg->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input 
                type="file" 
                name="ktp" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            <img src="/images/{{ $CitizenImg->ktp }}" width="300px">
            @error('ktp')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input 
                type="file" 
                name="kk" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            <img src="/images/{{ $CitizenImg->kk }}" width="300px">
            @error('kk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input 
                type="file" 
                name="akta" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            <img src="/images/{{ $CitizenImg->akta }}" width="300px">
            @error('akta')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input 
                type="file" 
                name="kia" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            <img src="/images/{{ $CitizenImg->kia }}" width="300px">
            @error('kia')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  </div>
</div>
@endsection
