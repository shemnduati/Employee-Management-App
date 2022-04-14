@extends('layouts.dashboard')

@section('content')

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Country</h1>                 
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="card  col-md-8">
            <div class="card-header">
               <h3>Create Country</h3>
               <a href="{{ route('countries.index') }}" class="float-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('countries.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="country_code">Country Code</label>
                        <input type="text" name="country_code" id="country_code" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}" required autocomplete="country_code" autofocus>
                        @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                    </div>
                    <div class="form-group">
                        <label for="country_name">Country Name</label>
                        <input type="text" name="country_name" id="country_name" class="form-control @error('country_name') is-invalid @enderror" name="first_name" value="{{ old('country_name') }}" required autocomplete="country_name" autofocus>
                        @error('country_name')
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