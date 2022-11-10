@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Notice</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('notice/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Notice</a>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Notice Type</th>
                        <th>Description</th>
                        <th>Notice Date</th>
                        <th>Notice by</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>01</td>
                        <td>Covid 19</td>
                        <td>Coronavirus dise... </td>
                        <td>12/6/22</td>
                        <td>Majnu</td>
                        <td>
                            <a href="" class="btn btn-success">View</a>
                            <a href="" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection