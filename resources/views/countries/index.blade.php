@extends('layouts.dashboard')

@section('content')

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Countries</h1>                 
    </div>
    <!-- Content Row -->
    <div class="row">
    <div class="card mx-auto">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            
        @endif
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form method="GET" action="{{ route('countries.index')}}">
                        <div class="form-row align-items-center">
                         <div class="col">
                            <input type="search" name="search" class="form-control" id="search" placeholder="Search">     
                        </div>
                        <div class="col">
                         <button type="submit" class="btn btn-primary">Search</button>    
                        </div>    
                        </div> 
                    </form>
                </div>
                <div class="col">
                    <a href="{{ route('countries.create') }}" class="btn btn-primary float-right">Add Country</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Country Code</th>
                            <th>CountryName</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                            <tr>
                                <td>{{  $country->id }}</td>
                                <td>{{  $country->country_code }}</td>
                                <td>{{  $country->country_name }}</td>
                                <td>
                                    <a href="{{ route('countries.edit',  $country->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('countries.destroy',  $country->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection