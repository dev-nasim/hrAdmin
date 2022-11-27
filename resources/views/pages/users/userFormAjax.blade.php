<form id="userEditForm" action="" method="post">
    <input type="hidden" class="form-control" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" autocomplete="off" name="email" value="{{ $user->email }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Birthday:</label>
        <input type="date" name="birthday"class="form-control" value="{{ $user->birthday }}">
    </div>
</form>
