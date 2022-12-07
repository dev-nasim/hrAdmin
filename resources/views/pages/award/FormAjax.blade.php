<form id="awardedit" action="" method="post">
    <input type="hidden" class="form-control" name="award_id" value="{{ isset($award) ? $award->id : '' }}">
    <div class="form-group">
        <label for="awd_name">Award Name:</label>
        <input type="text" value="{{$award->awd_name}}" class="form-control" name="awd_name" id="awd_name">
    </div>
    <div class="form-group">
        <label for="awd_des">Award Description:</label>
        <input type="text" name="awd_des" value="{{$award->awd_des}}" class="form-control" id="awd_des">
    </div>
    <div class="form-group">
        <label for="emp_name">Employee:</label>
        <select class="form-control" name="employee_id">
            <option value="">Select Employee</option>
            @foreach($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="awd_item">Gift Item:</label>
        <input type="text" name="awd_item" value="{{$award->awd_item}}" class="form-control" id="awd_item">
    </div>
    <div class="form-group">
        <label for="awd_date">Gift Date</label>
        <input type="date" name="awd_date" value="{{$award->awd_date}}" class="form-control" id="awd_date">
    </div>
    <div class="form-group">
        <label for="awd_by">Gift by:</label>
        <input type="text" name="awd_by" value="{{$award->awd_by}}" class="form-control" id="awd_by">
    </div>
</form>
