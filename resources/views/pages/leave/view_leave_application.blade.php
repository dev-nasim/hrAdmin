@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 text-left">
        <h1 class="h3 mb-2 text-gray-800">Leave Application</h1>
    </div>
    <div class="col-md-4 text-right">
        <a type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#add_appli"><i
                class="fa fa-plus"></i> Add Application</a>
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
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Worker Name</th>
                        <th>Leave Type</th>
                        <th>Apply Day</th>
                        <th>Approved Day</th>
                        <th>Reason</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="dataTable"></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="add_appli">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Leave</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="add_leave">
                            @csrf
                            <div class="form-group">
                                <label for="worker_name">worker Name:</label>
                                <input type="text" class="form-control" name="worker_name" id="worker_name">
                            </div>
                            <div class="form-group">
                                <label for="leave_type">Leave Type:</label>
                                <input type="text" name="leave_type" class="form-control" id="leave_type">
                            </div>
                            <div class="form-group">
                                <label for="apply_day">Apply Day:</label>
                                <input type="text" name="apply_day" class="form-control" id="apply_day">
                            </div>
                            <div class="form-group">
                                <label for="approve_day">Appove Day:</label>
                                <input type="text" name="approve_day" class="form-control" id="approve_day">
                            </div>
                            <div class="form-group">
                                <label for="reason">Reason:</label>
                                <input type="text" name="reason" class="form-control" id="reason">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="editData"></div>
                <div class="modal-footer">
                    <button id="dataUpdate" modal-id="editModal" type="button" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Application</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deleteData">
                    <h4 style="color: red;">DO you really want to cancel the Application?..</h4>
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
        window.dataUser = '{{ url('leave') }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('assets/scripts/leave.js') }}"></script>
@endsection
