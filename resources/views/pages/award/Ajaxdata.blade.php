@foreach($awards as $award)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{$award->awd_name}}</td>
    <td>{{$award->awd_des}}</td>
    <td>{{$award->employee ? $award->employee->name :  'NA'}}</td>
    <td>{{$award->awd_item}}</td>
    <td>{{$award->awd_date}}</td>
    <td>{{$award->awd_by}}</td>
    <td>
        <a class="btn btn-sm btn-warning editButton" id="{{ $award->id }}">Edit</a>
        <a class="btn btn-sm btn-danger deleteButton" id="{{ $award->id }}">Delete</a>
    </td>
</tr>
@endforeach
