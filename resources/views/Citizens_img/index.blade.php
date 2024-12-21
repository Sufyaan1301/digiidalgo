@extends('Citizens_img.layout')
 
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Laravel 11 CRUD with Image Upload Tutorial - ItSolutionStuff.com</h2>
  <div class="card-body">
          
        @if (session('success'))
            <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
        @endif
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('citizens_img.create') }}"> <i class="fa fa-plus"></i> Create New img</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>KTP</th>
                    <th>KK</th>
                    <th>Akta</th>
                    <th>KIA</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($Citizens_Img as $Citizen_img)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        @if ($Citizen_img->ktp && file_exists(public_path('images/' . $Citizen_img->ktp)))
                            <img src="{{ asset('images/' . $Citizen_img->ktp) }}" width="100px">
                        @else
                            <span>Image not available</span>
                        @endif
                    </td>
                    <td>
                        @if ($Citizen_img->kk && file_exists(public_path('images/' . $Citizen_img->kk)))
                            <img src="{{ asset('images/' . $Citizen_img->kk) }}" width="100px">
                        @else
                            <span>Image not available</span>
                        @endif
                    </td>
                    <td>
                        @if ($Citizen_img->akta && file_exists(public_path('images/' . $Citizen_img->akta)))
                            <img src="{{ asset('images/' . $Citizen_img->akta) }}" width="100px">
                        @else
                            <span>Image not available</span>
                        @endif
                    </td>
                    <td>
                        @if ($Citizen_img->kia && file_exists(public_path('images/' . $Citizen_img->kia)))
                            <img src="{{ asset('images/' . $Citizen_img->kia) }}" width="100px">
                        @else
                            <span>Image not available</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('citizens_img.destroy',$Citizen_img->id) }}" method="POST">
              
                            <a class="btn btn-info btn-sm" href="{{ route('citizens_img.show',$Citizen_img->id) }}"><i class="fa-solid fa-list"></i> Show</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('citizens_img.edit',$Citizen_img->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
              
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $Citizens_Img->withQueryString()->links('pagination::bootstrap-5') !!}
  
  </div>
</div>      
@endsection