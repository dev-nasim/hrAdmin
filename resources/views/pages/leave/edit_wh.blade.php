@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add New Weekly Holiday</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('weekly_holiday')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Weekly Holiday</a>
        </div>
        <div class="card-body">
            <form action="{{url('weekly_holiday/'.$weeklyholidys->id)}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                    <label for="weekly_holiday">Add:</label>
                    <input type="text" value="{{$weeklyholidys->weekly_holiday}}" class="form-control" name="weekly_holiday" id="weekly_holiday">
                    <span class="text-danger">{{$errors->has('weekly_holiday') ? $errors->first('weekly_holiday') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection