<form id="userEditForm" action="" method="post">
    <input type="hidden" class="form-control" name="role_id" value="{{ isset($role) ? $role->id : '' }}">
    <div class="form-group">
        <label for="name">Role:</label>
        <input types="text" class="form-control" name="role" value="{{ $role->role }}" id="name">
    </div>
</form>
