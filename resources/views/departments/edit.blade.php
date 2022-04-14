@extends('layouts.dashboard')

@section('content')

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Department</h1>                 
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="card  col-md-8">
            <div class="card-header">
               <h3 class="float-left">Update Department</h3>
               <a href="{{ route('departments.index') }}" class="float-right">Back</a>
            </div>
            
            <div class="card-body">
                <form action="{{ route('departments.update', $department->id)}}" method="post">
                    @csrf
                    @method('PUT')
                            <div class="form-group row">
                                <label for="department_name" class="col-md-4 col-form-label text-md-right">Department Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="department_name" id="department_name" class="form-control @error('department_name') is-invalid @enderror" name="department_name" value="{{ old('department_name',$department->department_name) }}" required autocomplete="department_name" autofocus>
                                        @error('department_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                            </div>
                        
                            
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection