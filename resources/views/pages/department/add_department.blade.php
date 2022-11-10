@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add New Department</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('department')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Department</a>
        </div>
        <div class="card-body">
            <form action="{{url('department')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="department_name">Department Name:</label>
                    <input type="text" class="form-control" name="department_name" id="department_name">
                    <span class="text-danger">{{$errors->has('department_name') ? $errors->first('department_name') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection