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
                        <th>Application Start Date</th>
                        <th>Application End Date</th>
                        <th>Approve Start Date</th>
                        <th>Approve End Date</th>
                        <th>Apply Day</th>
                        <th>Approved Day</th>
                        <th>Application Hard Copy</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    	<th>SL No</th>
                        <td>Nasim Mahmud</td>
                        <td>Sick</td>
                        <td>12/12/2022</td>
                        <td>22/12/2022</td>
                        <td>12/13/2022</td>
                        <td>12/19/2022</td>
                        <td>12/10/2022</td>
                        <td>12/13/2022</td>
                        <td></td>
                        <td>Approved</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection