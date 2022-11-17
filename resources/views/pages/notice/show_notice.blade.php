@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Show Notice</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="alert alert-info">{{ Session::get('success') }}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-hover" width="100%">
                    @foreach($notics as $notic)
                    <tr>
                        <th>Notice Date</th>
                        <td>2022-06-19</td>
                    </tr>
                    <tr>
                        <th>Notice By</th>
                        <td>HR</td>
                    </tr>
                    <tr>
                        <th>Notice Title</th> {{--Notice Type--}}
                        <td>{{$notic->notice_type}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>Coronavirus disease (COVID-19) is an infectious disease caused by the SARS-CoV-2 virus.</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection


