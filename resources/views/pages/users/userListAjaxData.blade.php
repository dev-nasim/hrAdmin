@foreach ($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->birthday }}</td>
        <td>
            <a class="btn btn-sm btn-outline-warning editButton" id="{{ $user->id }}">Edit</a>
            <a class="btn btn-sm btn-outline-danger deleteButton" id="{{ $user->id }}">Delete</a>
        </td>
    </tr>
@endforeach
