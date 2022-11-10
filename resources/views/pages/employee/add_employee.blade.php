@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add Employee</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('employee')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Employee</a>
        </div>
        <div class="card-body">
            <form action="{{url('employee')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" value="{{Request::old('name')}}" class="form-control" name="name" id="name">
                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" value="{{Request::old('email')}}" class="form-control" id="email">
                    <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" value="{{Request::old('phone')}}" class="form-control" id="phone">
                    <span class="text-danger">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <select class="form-control" name="department">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{$department->department_name}}">{{$department->department_name}}</option>
                        @endforeach
                    </select>
                    <!-- <input type="text" name="department" value="{{Request::old('department')}}" class="form-control" id="department"> -->
                    <span class="text-danger">{{$errors->has('department') ? $errors->first('department') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" name="designation" value="{{Request::old('designation')}}" class="form-control" id="designation">
                    <span class="text-danger">{{$errors->has('designation') ? $errors->first('designation') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection