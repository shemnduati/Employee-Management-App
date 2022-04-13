@extends('layouts.dashboard')

@section('content')

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">City</h1>                 
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="card  col-md-8">
            <div class="card-header">
               <h3>Create City</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cities.store')}}" method="post">
                    @csrf
                
                    <div class="form-group">
                        <label for="city_name">City Name</label>
                        <input type="text" name="city_name" id="city_name" class="form-control @error('city_name') is-invalid @enderror" name="city_name" value="{{ old('city_name') }}" required autocomplete="city_name" autofocus>
                        @error('city_name')
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