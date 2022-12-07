@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 text-left">
            <h1 class="h3 mb-2 text-gray-800">Employee List</h1>
        </div>
        <div class="col-md-4 text-right">
            <a type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#add_emp"><i lass="fa fa-plus"></i> Add Employee</a>
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
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="dataTable"></tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="modal fade" id="add_emp">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Employee</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="add_employe">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" value="{{Request::old('name')}}" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="position">Position:</label>
                                    <select class="form-control" name="possition_id">
                                        <option value="">Select Position</option>
                                        @foreach($positions as $possition)
                                            <option value="{{$possition->id}}">{{$possition->possition}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" name="department" value="{{Request::old('possition_id')}}" class="form-control" id="department"> -->
                                    <span class="text-danger">{{$errors->has('possition_id') ? $errors->first('possition_id') : ''}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" value="{{Request::old('email')}}" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" value="{{Request::old('phone')}}" class="form-control" id="phone">
                                </div>
                                <div class="form-group">
                                    <label for="department">Department:</label>
                                    <select class="form-control" name="department_id">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation:</label>
                                    <input type="text" name="designation" value="{{Request::old('designation')}}" class="form-control" id="designation">
                                    <span class="text-danger">{{$errors->has('designation') ? $errors->first('designation') : ''}}</span>
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
        window.dataUser = '{{ url('employee') }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('assets/scripts/employee.js') }}"></script>
@endsection
