@extends('layouts.dashboard')

@section('content')

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">States</h1>                 
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
                    <form method="GET" action="{{ route('states.index')}}">
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
                    <a href="{{ route('states.create') }}" class="btn btn-primary float-right">Add State</a>
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
                            <th>Country Name</th>
                            <th>State Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($states as $state)
                            <tr>
                                <td>{{  $state->id }}</td>
                                <td>{{  $state->country->country_code}}</td>
                                <td>{{  $state->country->country_name}}</td>
                                <td>{{ $state->state_name }}</td>
                                <td>
                                    <a href="{{ route('states.edit',  $state->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('states.destroy',  $state->id)}}" method="post" class="d-inline">
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