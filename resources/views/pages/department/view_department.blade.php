@extends('layouts.master')

@section('content')
   <div class="row">
       <div class="col-md-8 text-left">
           <h1 class="h3 mb-2 text-gray-800">Department</h1>
       </div>
       <div class="col-md-4 text-right">
           <a href="{{url('department/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Department</a>
       </div>
   </div>
    <div class="card shadow mb-4">
        <form action="" method="GET">
            <div class="card-header py-3 row">
                <div class="col-md-4">
                    <select name="has_award" class="form-control">
                        <option value="">Has award</option>
                        <option value="yes">YES</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('success'))
                <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                    <tr>
                        <td>{{$department->id}}</td>
                        <td>{{$department->department_name}}</td>
                        <td>
                            <form action="{{ route('department.destroy',$department->id) }}" method="Post">
                            <a href="{{ route('department.edit',$department->id) }}" class="btn btn-success"><i class="fa fa-pen"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection