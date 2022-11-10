@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">New Notice</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('notice')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Notice</a>
        </div>
        <div class="card-body">
            <form action="{{url('notice')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="notice_type">Notice Type:</label>
                    <input type="text"  value="{{Request::old('notice_type')}}" class="form-control" name="notice_type" id="notice_type">
                </div>
                <div class="form-group">
                    <label for="notice_dsc">Description:</label>
                    <textarea type="text" value="{{Request::old('description')}}" name="description" class="form-control" id="description" placeholder="less then 80 alphabet"></textarea>
                </div>
                <div class="form-group">
                    <label for="notice_date">Notice Date:</label>
                    <input type="date" value="{{Request::old('notice_date')}}" name="notice_date" class="form-control" id="notice_date">
                </div>
                <div class="form-group">
                    <label for="notice_by">Notice by:</label>
                    <input type="text" value="{{Request::old('notice_by')}}" name="notice_by" class="form-control" id="notice_by">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
