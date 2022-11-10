@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add Sub Department</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('subdepartment')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Sub Department</a>
        </div>
        <div class="card-body">
            <form action="{{url('subdepartment')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="sub_department">Sub Department Name:</label>
                    <input type="text" class="form-control" name="sub_department" id="sub_department">
                    <span class="text-danger">{{$errors->has('sub_department') ? $errors->first('sub_department') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="department">Department Name:</label>
                    <select class="form-control" name="department">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option name="department" value="{{$department->department_name}}">{{$department->department_name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->has('department') ? $errors->first('department') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection