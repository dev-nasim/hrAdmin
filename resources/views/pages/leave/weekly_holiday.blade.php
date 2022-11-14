@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Weekly Holiday</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
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
                        <th>Weekly Leave Day</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($weeklyholidys as $weeklyholidy)
                        <tr>
                            <td>{{$weeklyholidy->id}}</td>
                            <td>{{$weeklyholidy->weekly_holiday}}</td>
                            <td>
                                <a href="{{ route('weekly_holiday.edit',$weeklyholidy->id) }}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection