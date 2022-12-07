<form id="leavedit" action="" method="POST">
    <input type="hidden" class="form-control" name="leave_id" value="{{ isset($leave) ? $leave->id : '' }}">
    <div class="form-group">
        <label for="worker_name">worker Name::</label>
        <input type="text" value="{{$leave->worker_name}}" class="form-control" name="name" id="worker_name">
    </div>
    <div class="form-group">
        <label for="leave_type">Leave Type:</label>
        <input type="text" name="type" class="form-control" id="leave_type" value="{{$leave->leave_type}}">
    </div>
    <div class="form-group">
        <label for="apply_day">Apply Day:</label>
        <input type="text" name="applyday" id="apply_day" class="form-control" value="{{$leave->apply_day}}">
    </div>
    <div class="form-group">
        <label for="approve_day">Appove Day:</label>
        <input type="text" name="approve_day" class="form-control" value="{{$leave->approve_day}}">
    </div>
    <div class="form-group">
        <label for="reason">Reason:</label>
        <input type="text" name="reason" class="form-control" value="{{$leave->reason}}">
    </div>
</form>
