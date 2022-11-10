@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('possition')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Employee</a>
        </div>
        <div class="card-body">
            <form action="{{url('possition/'.$possitions->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                    <label for="possition">Name:</label>
                    <input type="text" value="{{$possitions->possition}}" class="form-control" name="possition" id="possition">
                    <span class="text-danger">{{$errors->has('possition') ? $errors->first('possition') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="possition_details">Possition Details:</label>
                    <input type="text" name="possition_details" value="{{$possitions->possition_details}}" class="form-control" id="possition_details">
                    <span class="text-danger">{{$errors->has('possition_details') ? $errors->first('possition_details') : ''}}</span>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection