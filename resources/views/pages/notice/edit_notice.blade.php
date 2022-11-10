@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Notice</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{url('notice/' .$notics->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                    <label for="notice_type">Notice Type:</label>
                    <input type="text"  value="{{$notics->notice_type}}" class="form-control" name="notice_type" id="notice_type">
                    <span class="text-danger">{{$errors->has('notice_type') ? $errors->first('notice_type') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="notice_dsc">Description:</label>
                    <textarea type="text" value="{{$notics->description}}" name="description" class="form-control" id="description" placeholder="less then 80 alphabet"></textarea>
                    <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="notice_date">Notice Date:</label>
                    <input type="date" value="{{$notics->notice_date}}" name="notice_date" class="form-control" id="notice_date">
                    <span class="text-danger">{{$errors->has('notice_date') ? $errors->first('notice_date') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="notice_by">Notice by:</label>
                    <input type="text" value="{{$notics->notice_by}}" name="notice_by" class="form-control" id="notice_by">
                    <span class="text-danger">{{$errors->has('notice_by') ? $errors->first('notice_by') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
