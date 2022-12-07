@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Role List</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_modal"><i class="fa fa-plus"></i> Add Role</a>
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
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="roleListBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- The Role Edit Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="editData">

                </div>
                <div class="modal-footer">
                    <button id="dataUpdate" modal-id="editModal" type="button" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- The Role Add Modal -->
    <div class="container">
        <div class="modal fade" id="add_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="add_role">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <input type="text" class="form-control" name="role" id="role">
                                <span class="text-danger">{{$errors->has('role') ? $errors->first('role') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-dark" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- delete user --}}
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deleteData">
                    <h4 style="color: red">Are you sure? want to delete this data..!!</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" id="btCancel">No</button>
                    <button id="btConfirm" modal-id="deleteModal" type="button" class="btn btn-outline-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        window.dataUser = '{{ url('role') }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('assets/scripts/role.js') }}"></script>
@endsection




