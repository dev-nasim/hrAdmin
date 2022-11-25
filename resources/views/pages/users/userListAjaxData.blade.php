@foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td></td>
        <td>
            <a class="btn btn-outline-warning" href="{{url("users/$user->id/edit")}}">Edit</a>
        </td>
    </tr>
@endforeach