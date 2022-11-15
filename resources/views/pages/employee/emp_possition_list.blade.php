@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Manage Possition</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('possition/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Possition</a>
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
                        <th>Position</th>
                        <th>Position Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>    
                    <tbody>
                    @foreach($possitions as $possition)
                    <tr>
                        <td>{{$possition->id}}</td>
                        <td>{{$possition->possition}}</td>
                        <td>{{$possition->possition_details}}</td>
                        <td>
                            <form action="{{ route('possition.destroy',$possition->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('possition.edit',$possition->id) }}"><i class="fa fa-pen"></i></a>
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