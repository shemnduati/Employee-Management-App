@extends('layouts.dashboard')

@section('content')

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Departments</h1>                 
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
                    <form method="GET" action="{{ route('departments.index')}}">
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
                    <a href="{{ route('departments.create') }}" class="btn btn-primary float-right">Add State</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Department Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{  $department->id }}</td>
                                <td>{{  $department->department_name}}</td>
                                <td>
                                    <a href="{{ route('departments.edit',  $department->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('departments.destroy',  $department->id)}}" method="post" class="d-inline">
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