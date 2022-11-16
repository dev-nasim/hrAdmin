@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Leave Application</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('leave_application')}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Manage Leave Type</a>
        </div>
        <div class="card-body">
            <form action="" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="emp_name">Employee Name:</label>
                        <input type="text" class="form-control" name="emp_name" id="emp_name">
                    </div>

                    <div class="form-group  col-md-6">
                        <label for="lv_type">Leave Type:</label>
                        <input type="text" name="lv_type" class="form-control" id="lv_type">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="app_day">Apply Day:</label>
                        <input type="text" name="app_day" class="form-control" id="app_day">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="app_day">Appove Day:</label>
                        <input type="text" name="app_day" class="form-control" id="app_day">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="reason">Reason:</label>
                        <textarea type="text" name="reason" class="form-control" id="reason"></textarea>
                    </div>
                    <div class="form-group  col-md-12">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
