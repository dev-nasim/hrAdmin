@foreach ($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->birthday }}</td>
        <td>
            <a class="btn btn-outline-warning editButton" id="{{ $user->id }}">Edit</a>
        </td>
    </tr>
@endforeach
