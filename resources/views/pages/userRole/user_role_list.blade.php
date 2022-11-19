@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">User Role List</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('user_role/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i>User Add Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('success'))
                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user_roles as $user_role)
                        <tr>
                            <td>{{$user_role->id}}</td>
                            <td>{{$user_role->user ? $user_role->user->name: ''}}</td>
                            <td>{{$user_role->role ? $user_role->role->role: ''}}</td>
                            <td>
                                <form action="{{ route('user_role.destroy',$user_role->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('user_role.edit',$user_role->id) }}"><i class="fa fa-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
