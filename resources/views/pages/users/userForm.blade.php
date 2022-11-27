@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">User Add</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <form id="userForm" action="{{ isset($user) ? url("users/$user->id") : url('users') }}" method="post">
                {{ csrf_field() }}

                @if (isset($user))
                    <input type="hidden" class="form-control" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ isset($user) ? $user->name : '' }}">
                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" autocomplete="off" name="email" value="{{ isset($user) ? $user->email : '' }}"
                        class="form-control">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                </div>
                <div class="form-group">
                    <label for="email">Birthday:</label>
                    <input type="date" name="birthday" value="{{ isset($user) ? $user->birthday : '' }}"
                        class="form-control">
                    <span class="text-danger">{{ $errors->has('birthday') ? $errors->first('birthday') : '' }}</span>
                </div>
                @if (!isset($user))
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control">
                        <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                    </div>
                @endif

        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#submitButton").on('click', function(e) {
            e.preventDefault();
            var URL = `{{ url('users') }}`;
            $.ajax({
                url: URL,
                type: "post",
                data: {
                    name: $("#name").val(),
                    email: $("input[name=email]").val(),
                    birthday: $("input[name=birthday]").val(),
                    password: $("input[name=password]").val(),
                },
                success: function(response) {
                    if (parseInt(response.status) === 2000) {
                        $.toaster({
                            priority: 'success',
                            title: 'Success',
                            message: response.message
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $.toaster({
                        priority: 'warning',
                        title: 'warning',
                        message: 'Validation failed'
                    });
                }
            });

            return false;
        });
    </script>
@endsection
