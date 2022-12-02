@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-8 text-left">
            <h1 class="h3 mb-2 text-gray-800">User List</h1>
        </div>
        <div class="col-md-4 text-right">
            <a type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#add_modal"><i
                    class="fa fa-plus"></i> Add
                User</a>
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
                @if (Session::has('success'))
                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userListBody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="editData"></div>
                <div class="modal-footer">
                    <button id="dataUpdate" modal-id="editModal" type="button" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>

    {{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> --}}
    {{--        Open modal --}}
    {{--    </button> --}}

    <!-- The User Add Modal -->
    <div class="container">
        <div class="modal fade" id="add_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="add_user">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" autocomplete="off" name="email" class="form-control">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Birthday:</label>
                                <input type="date" name="birthday" class="form-control">
                                <span
                                    class="text-danger">{{ $errors->has('birthday') ? $errors->first('birthday') : '' }}</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control">
                                <span
                                    class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- delete user --}}
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deleteData">
                    <h4>Are you sure? want to delete this data..!!</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btCancel">No</button>
                    <button id="btConfirm" modal-id="deleteModal" type="button" class="btn btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        window.dataUser = '{{ url('users') }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('assets/scripts/users.js') }}"></script>
@endsection
