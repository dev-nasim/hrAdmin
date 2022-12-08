@foreach($user_roles as $user_role)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$user_role->user ? $user_role->user->name: ''}}</td>
        <td>{{$user_role->role ? $user_role->role->role: ''}}</td>
        <td>
            <a class="btn btn-sm btn-outline-warning editButton" id="{{ $user_role->id }}">Edit</a>
            <a class="btn btn-sm btn-outline-danger deleteButton" id="{{ $user_role->id }}">Delete</a>
        </td>
    </tr>
@endforeach