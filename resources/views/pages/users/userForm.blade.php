@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">User Add</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <form action="{{url('users')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="usr">Name:</label>
                    <input type="text" class="form-control" name="name" id="usr">
                </div>
                <div class="form-group">
                    <label for="possition">Possition:</label>
                    <input type="text" name="possition" class="form-control" id="possition">
                </div>
                <div class="form-group">
                    <label for="office">Office:</label>
                    <input type="text" name="office" class="form-control" id="office">
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" name="age" class="form-control" id="age">
                </div>
                <div class="form-group">
                    <label for="start-date">Start Date:</label>
                    <input type="date" name="start-date" class="form-control" id="start-date">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection