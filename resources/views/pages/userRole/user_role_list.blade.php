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
                    <tbody id="userRoleListBody">

                    </tbody>
                </table>
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
        window.dataUser = '{{ url('user_role') }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('assets/scripts/user_role.js') }}"></script>
@endsection
