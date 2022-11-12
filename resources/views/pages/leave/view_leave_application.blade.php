@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Leave Application List</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('leave_application/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Leave Application</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Name</th>
                        <th>Leave Type</th>
                        <th>Apply Day</th>
                        <th>Approved Day</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nasim Mahmud</td>
                        <td>Sick</td>
                        <td>12/12/2022</td>
                        <td>22/12/2022</td>
                        <td>Approved</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
