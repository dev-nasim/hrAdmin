@extends('layouts.master')

@section('content')
    @include('pages.department.modalForm')

    <div class="row">
        <div class="col-md-8 text-left">
            <h1 class="h3 mb-2 text-gray-800">Department</h1>
        </div>
        <div class="col-md-4 text-right">
            {{-- {{ url('department/create') }} --}}
            <a href="#" type="button" data-toggle="modal" data-target="#addModal" class="btn btn-primary"><i
                    class="fa fa-plus"></i> Add Department</a>
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
                @if (Session::has('success'))
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
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $department->department_name }}</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-warning editDptButton"
                                        id="{{ $department->id }}">Edit</a>

                                    <a class="btn btn-sm btn-outline-danger deleteButton"
                                        id="{{ $department->id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        window.dataUser = '{{ url('department') }}';
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('assets/scripts/department.js') }}"></script>
@endsection
