@foreach ($roles as $role)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $role->role }}</td>
        <td>
            <a class="btn btn-sm btn-outline-warning editButton" id="{{ $role->id }}">Edit</a>
            <a class="btn btn-sm btn-outline-danger deleteButton" id="{{ $role->id }}">Delete</a>
        </td>
    </tr>
@endforeach
