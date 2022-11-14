@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Gift Item</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('award/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Gift</a>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('success'))
                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Employee Name</th>
                        <th>Award Name</th>
                        <th>Award Description</th>
                        <th>Gift Item</th>
                        <th>Date</th>
                        <th>Gift by</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($awards as $award)
                    <tr>
                        <td>{{$award->id}}</td>
                        <td><strong style="color: #000000">{{$award->emp_name}}</strong></td>
                        <td>{{$award->awd_name}}</td>
                        <td>{{$award->awd_des}}</td>
                        <td>{{$award->awd_item}}</td>
                        <td>{{$award->awd_date}}</td>
                        <td>{{$award->awd_by}}</td>
                        <td>
                            <form action="{{ route('award.destroy',$award->id) }}" method="Post">
                                <a href="{{ route('award.edit',$award->id) }}" class="btn btn-success">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
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