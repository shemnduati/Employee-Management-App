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
               <h3>Create State</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('states.store')}}" method="post">
                    @csrf
                
                    <div class="form-group">
                        <label for="state_name">State Name</label>
                        <input type="text" name="state_name" id="state_name" class="form-control @error('state_name') is-invalid @enderror" name="state_name" value="{{ old('state_name') }}" required autocomplete="state_name" autofocus>
                        @error('state_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection