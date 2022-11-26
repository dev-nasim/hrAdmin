@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 text-left">
            <h1 class="h3 mb-2 text-gray-800">User List</h1>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{url('users/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-header py-3 row">
                <div class="col-md-4">
                    <input type="text" id="keyword" class="form-control">
                </div>
                <div class="col-md-1">
                    <a class="btn btn-outline-primary" onclick="loadAjaxData()" type="submit">Search</a>
                </div>
            </div>
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
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="userListBody">
{{--                    @foreach($users as $user)--}}
{{--                        <tr>--}}
{{--                            <td>{{$user->id}}</td>--}}
{{--                            <td>{{$user->name}}</td>--}}
{{--                            <td>{{$user->email}}</td>--}}
{{--                            <td></td>--}}
{{--                            <td>--}}
{{--                                <a class="btn btn-outline-warning" href="{{url("users/$user->id/edit")}}">Edit</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var targetInput = $('#keyword');
        loadAjaxData();
        function loadAjaxData() {
            var keyword = targetInput.val();
            var URL = `{{url('users')}}?keyword=${keyword}`;
            $.ajax({
                url: URL,
                type: "get",
                success: function (response) {
                    $('#userListBody').html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
        targetInput.on('keyup', function () {
            loadAjaxData();
        });
    </script>
@endsection