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
                    
                    <div class="form-group row">
                        <label for="state_id" class="col-md-4 col-form-label text-md-right">City</label>
                        <div class="col-md-6">
                            <select name="state_id" id="state_id" class="form-control @error('state_id') is-invalid @enderror" name="state_id" value="{{ old('state_id') }}" required autocomplete="state_id" autofocus>
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{$state->id == $city->state_id ? 'selected': ''}}>{{ $state->state_name }}</option>
                                @endforeach
                            </select>
                            @error('state_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                         
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city_name" class="col-md-4 col-form-label text-md-right">State Name</label>
                        <div class="col-md-6">
                            <input type="text" name="city_name" id="city_name" class="form-control @error('city_name') is-invalid @enderror" name="city_name" value="{{ old('city_name',$city->city_name) }}" required autocomplete="city_name" autofocus>
                        @error('city_name')
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