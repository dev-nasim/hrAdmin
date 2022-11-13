@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add Holiday</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('holiday')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Holiday</a>
        </div>
        <div class="card-body">
            <form action="{{url('holiday/'.$holiday->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                    <label for="h_name">Holiday Name:</label>
                    <input type="text" class="form-control" name="h_name" id="h_name">
                    <span class="text-danger">{{$errors->has('h_name') ? $errors->first('h_name') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="from">From:</label>
                    <input type="date" name="from" class="form-control" id="from">
                    <span class="text-danger">{{$errors->has('from') ? $errors->first('from') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="to">To:</label>
                    <input type="date" name="to" class="form-control" id="to">
                    <span class="text-danger">{{$errors->has('to') ? $errors->first('to') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="no_days">Number Of Days</label>
                    <input type="number" name="no_days" class="form-control" id="no_days">
                    <span class="text-danger">{{$errors->has('no_days') ? $errors->first('no_days') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
