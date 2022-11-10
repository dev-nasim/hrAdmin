@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add Possiton</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('possition')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Possition</a>
        </div>
        <div class="card-body">
            <form action="{{url('possition')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="possition">Possition Name:</label>
                    <input type="text" value="{{Request::old('possiton')}}" class="form-control" name="possition" id="possition">
                    <span class="text-danger">{{$errors->has('possiton') ? $errors->first('possiton') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="possition_details">Possition Details:</label>
                    <input type="text" value="{{Request::old('possition_details')}}"  name="possition_details" class="form-control" id="possition_details">
                    <span class="text-danger">{{$errors->has('possition_details') ? $errors->first('possition_details') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection