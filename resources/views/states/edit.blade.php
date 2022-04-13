@extends('layouts.dashboard')

@section('content')

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">State</h1>                 
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="card  col-md-8">
            <div class="card-header">
               <h3 class="float-left">Update State</h3>
               <a href="{{ route('states.index') }}" class="float-right">Back</a>
            </div>
            
            <div class="card-body">
                <form action="{{ route('states.update', $state->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="state_name">State name</label>
                        <input type="text" name="state_name" id="stae_name" class="form-control @error('state_name') is-invalid @enderror" name="state_name" value="{{ old('state_name',$state->state_name) }}" required autocomplete="state_name" autofocus>
                        @error('state_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>  
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection