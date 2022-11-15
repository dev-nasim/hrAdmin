@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Notice</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('notice/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Notice</a>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="alert alert-info">{{ Session::get('success') }}</p>
            @endif
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
                    @foreach($notics as $notic)
                    <tr>
                        <td>{{$notic->id}}</td>
                        <td>{{$notic->notice_type}}</td>
                        <td>{{$notic->description}}</td>
                        <td>{{$notic->notice_date}}</td>
                        <td>{{$notic->notice_by}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('notice.edit',$notic->id) }}"><i class="fa fa-pen"></i></a>
                            <form action="{{ route('notice.destroy',$notic->id) }}" method="Post">
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
