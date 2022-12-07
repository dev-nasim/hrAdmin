<form id="editemp" action="" method="post">
    <input type="hidden" class="form-control" name="employee_id" value="{{ isset($employee) ? $employee->id : '' }}">
<div class="form-group">
    <label for="employee_name">Name:</label>
    <input type="text" value="{{$employee->name}}" class="form-control" name="employee_name" id="name">
</div>
<div class="form-group">
    <label for="possition">Possition:</label>
    <select class="form-control" name="position" id="position_name">
        <option value="{{$employee->position->possition}}">Select Position</option>
        @foreach($positions as $possition)
            <option {{$employee->possition_id == $possition->id ? 'selected' : ''}} value="{{$possition->id}}">{{$possition->possition}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" name="email_no" value="{{$employee->email}}" class="form-control" id="email">
</div>
<div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" name="number" value="{{$employee->phone}}" class="form-control" id="number">
</div>
<div class="form-group">
    <label for="department">Department:</label>
    <select class="form-control" name="department" id="editDepartment">
        <option value="{{$employee->department->department_name}}">Select Department</option>
        @foreach($departments as $department)
            <option {{$employee->department_id == $department->id ? 'selected' : ''}} value="{{$department->id}}">{{$department->department_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="designation">Designation:</label>
    <input type="text" name="designate" value="{{$employee->designation}}" class="form-control" id="designation">
</div>
</form>
