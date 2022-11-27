@foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->birthday }}</td>
        <td>
            <a class="btn btn-outline-warning editButton" id="{{ $user->id }}">Edit</a>
            <a class="btn btn-outline-warning editButton2" id="{{ $user->id }}">Edit2</a>
        </td>
    </tr>
@endforeach
