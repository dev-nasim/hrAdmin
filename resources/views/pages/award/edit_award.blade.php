@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add New Award</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('award')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Award</a>
        </div>
        <div class="card-body">
            <form action="{{url('award/'.$awards->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                    <label for="awd_name">Award Name:</label>
                    <input type="text" value="{{$awards->awd_name}}" class="form-control" name="awd_name" id="awd_name">
                    <span class="text-danger">{{$errors->has('awd_name') ? $errors->first('awd_name') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="awd_des">Award Description:</label>
                    <input type="text" name="awd_des" value="{{$awards->awd_des}}" class="form-control" id="awd_des" placeholder="less then 50 alphabet">
                    <span class="text-danger">{{$errors->has('awd_des') ? $errors->first('awd_des') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="emp_name">Employee:</label>
                    <select class="form-control" name="employee_id">
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->has('employee_id') ? $errors->first('employee_id') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="awd_item">Gift Item:</label>
                    <input type="text" name="awd_item" value="{{$awards->awd_item}}" class="form-control" id="awd_item">
                    <span class="text-danger">{{$errors->has('awd_item') ? $errors->first('awd_item') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="awd_date">Gift Date</label>
                    <input type="date" name="awd_date" value="{{$awards->awd_date}}" class="form-control" id="awd_date">
                    <span class="text-danger">{{$errors->has('awd_date') ? $errors->first('awd_date') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="awd_by">Gift by:</label>
                    <input type="text" name="awd_by" value="{{$awards->awd_by}}" class="form-control" id="awd_by">
                    <span class="text-danger">{{$errors->has('awd_by') ? $errors->first('awd_by') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
