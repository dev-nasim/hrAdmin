@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Weekly Holiday</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('holiday/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Holiday</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Holiday Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Number of Days</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>01</td>
                        <td>Ramzan</td>
                        <td>12/12/2022</td>
                        <td>12/12/2022</td>
                        <td>10</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection