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
               <h3 class="float-left">Update City</h3>
               <a href="{{ route('cities.index') }}" class="float-right">Back</a>
            </div>
            
            <div class="card-body">
                <form action="{{ route('cities.update', $city->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="city_name">City name</label>
                        <input type="text" name="city_name" id="city_name" class="form-control @error('city_name') is-invalid @enderror" name="city_name" value="{{ old('city_name',$city->city_name) }}" required autocomplete="city_name" autofocus>
                        @error('city_name')
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