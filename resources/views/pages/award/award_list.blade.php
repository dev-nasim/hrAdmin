@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 text-left">
        <h1 class="h3 mb-2 text-gray-800">Award List</h1>
    </div>
    <div class="col-md-4 text-right">
        <a type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#add_gift"><i
                class="fa fa-plus"></i> Add Award</a>
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
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Award Name</th>
                        <th>Award Description</th>
                        <th>Employee</th>
                        <th>Gift Item</th>
                        <th>Date</th>
                        <th>Gift by</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="dataTable"></tbody>
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
        <div class="modal fade" id="add_gift">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="add_award">
                            @csrf
                            <div class="form-group">
                                <label for="awd_name">Award Name:</label>
                                <input type="text" class="form-control" name="awd_name" id="awd_name">
                                <span class="text-danger">{{$errors->has('awd_name') ? $errors->first('awd_name') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="awd_des">Award Description:</label>
                                <input type="text" name="awd_des" class="form-control" id="awd_des" placeholder="less then 50 alphabet">
                                <span class="text-danger">{{$errors->has('awd_des') ? $errors->first('awd_des') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="emp_name">Employee:</label>
                                <select class="form-control" name="employee_id">
                                    <option value="">Select Employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('employee_id') ? $errors->first('employee_id') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="awd_item">Gift Item:</label>
                                <input type="text" name="awd_item" class="form-control" id="awd_item">
                                <span class="text-danger">{{$errors->has('awd_item') ? $errors->first('awd_item') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="awd_date">Gift Date</label>
                                <input type="date" name="awd_date" class="form-control" id="awd_date">
                                <span class="text-danger">{{$errors->has('awd_date') ? $errors->first('awd_date') : ''}}</span>
                            </div>
                            <div class="form-group">
                                <label for="awd_by">Gift by:</label>
                                <input type="text" name="awd_by" class="form-control" id="awd_by">
                                <span class="text-danger">{{$errors->has('awd_by') ? $errors->first('awd_by') : ''}}</span>
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="deleteData">
                    <h4 style="color: red;">Are you sure? want to delete this data..!!</h4>
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
        window.dataUser = '{{ url('award') }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('assets/scripts/award.js') }}"></script>
@endsection
