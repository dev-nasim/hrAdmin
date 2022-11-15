@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800"> Holiday</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('holiday/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Holiday</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('success'))
                <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Holiday Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Number of Days</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($holidays as $holiday)
                    <tr>
                        <td>{{ $holiday->id }}</td>
                        <td>{{ $holiday->h_name }}</td>
                        <td>{{ $holiday->from }}</td>
                        <td>{{ $holiday->to }}</td>
                        <td>{{ $holiday->no_days }}</td>
                        <td>
                            <form action="{{ route('holiday.destroy',$holiday->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('holiday.edit',$holiday->id) }}"><i class="fa fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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
