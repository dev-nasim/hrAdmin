@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Employee List</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('employee/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Employee</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('success'))
                <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->department ? $employee->department->department_name : 'NA'}}</td>
                        <td>{{$employee->designation}}</td>
                        <td>
                            <form action="{{ route('employee.destroy',$employee->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
