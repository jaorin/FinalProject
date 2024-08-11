<div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
    <label for="role_id" class="control-label">{{ 'Role Id' }}</label>
    <input class="form-control" name="role_id" type="number" id="role_id" value="{{ isset($role->role_id) ? $role->role_id : ''}}" >
    {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('role_name') ? 'has-error' : ''}}">
    <label for="role_name" class="control-label">{{ 'Role Name' }}</label>
    <input class="form-control" name="role_name" type="text" id="role_name" value="{{ isset($role->role_name) ? $role->role_name : ''}}" >
    {!! $errors->first('role_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
