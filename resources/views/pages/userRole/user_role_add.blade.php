@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">User Role Add</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('user_role')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Role</a>
        </div>
        <div class="card-body">
            <form action="{{url('user_role')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="user_id">Department:</label>
                    <select class="form-control" name="user_id">
                        <option value="">Select Department</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->has('user_id') ? $errors->first('user_id') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="role_id">Role:</label>
                    <select class="form-control" name="role_id">
                        <option value="">Select Role:</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->has('role_id') ? $errors->first('role_id') : ''}}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection