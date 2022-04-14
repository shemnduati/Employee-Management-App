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
               <a href="{{ route('states.index') }}" class="float-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('states.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="country_id" class="col-md-4 col-form-label text-md-right">Country</label>
                        <div class="col-md-6">
                            <select name="country_id" id="country_id" class="form-control @error('country_id') is-invalid @enderror" name="country_id" value="{{ old('country_id') }}" required autocomplete="country_id" autofocus>
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                         
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="state_name" class="col-md-4 col-form-label text-md-right">State Name</label>
                        <div class="col-md-6">
                            <input type="text" name="state_name" id="state_name" class="form-control @error('state_name') is-invalid @enderror" name="state_name" value="{{ old('state_name') }}" required autocomplete="state_name" autofocus>
                        @error('state_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection