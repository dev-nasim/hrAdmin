@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">User Add</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <form action="{{url('users')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="user">
                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" id="email">
                    <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection