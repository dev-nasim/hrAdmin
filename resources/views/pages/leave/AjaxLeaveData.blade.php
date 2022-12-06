@foreach ($leaves as $leave)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$leave->worker_name}}</td>
        <td>{{$leave->leave_type}}</td>
        <td>{{$leave->apply_day}}</td>
        <td>{{$leave->approve_day}}</td>
        <td>{{$leave->reason}}</td>
        <td>
            <a class="btn btn-sm btn-warning editButton" id="{{ $leave->id }}">Edit</a>
            <a class="btn btn-sm btn-danger deleteButton" id="{{ $leave->id }}">Cancel</a>
        </td>
    </tr>
@endforeach
