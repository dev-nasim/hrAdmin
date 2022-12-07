@foreach($employees as $employee)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{$employee->name}}</td>
    <td>{{$employee->position ? $employee->position->possition: ''}}</td>
    <td>{{$employee->email}}</td>
    <td>{{$employee->phone}}</td>
    <td>{{$employee->department ? $employee->department->department_name: 'NA'}}</td>
    <td>{{$employee->designation}}</td>
    <td>
        <a class="btn btn-sm btn-warning editButton" id="{{ $employee->id }}">Edit</a>
        <a class="btn btn-sm btn-danger deleteButton" id="{{ $employee->id }}">Delete</a>
    </td>
</tr>
@endforeach
