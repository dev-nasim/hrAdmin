@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit {{$employees->name}}</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('employee')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Employee</a>
        </div>
        <div class="card-body">
            <form action="{{url('employee/'.$employees->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" value="{{$employees->name}}" class="form-control" name="name" id="name">
                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" value="{{$employees->email}}" class="form-control" id="email">
                    <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" value="{{$employees->phone}}" class="form-control" id="phone">
                    <span class="text-danger">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" name="department_id" value="{{$employees->department->department_name}}" class="form-control" id="department">
                    <span class="text-danger">{{$errors->has('department_id') ? $errors->first('department_id') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" name="designation" value="{{$employees->designation}}" class="form-control" id="designation">
                    <span class="text-danger">{{$errors->has('designation') ? $errors->first('designation') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
