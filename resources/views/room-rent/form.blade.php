<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($roomrent->user_id) ? $roomrent->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('room_id') ? 'has-error' : ''}}">
    <label for="room_id" class="control-label">{{ 'Room Id' }}</label>
    <input class="form-control" name="room_id" type="number" id="room_id" value="{{ isset($roomrent->room_id) ? $roomrent->room_id : ''}}" >
    {!! $errors->first('room_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_rent') ? 'has-error' : ''}}">
    <label for="end_rent" class="control-label">{{ 'End Rent' }}</label>
    <input class="form-control" name="end_rent" type="datetime-local" id="end_rent" value="{{ isset($roomrent->end_rent) ? $roomrent->end_rent : ''}}" >
    {!! $errors->first('end_rent', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rent_note') ? 'has-error' : ''}}">
    <label for="rent_note" class="control-label">{{ 'Rent Note' }}</label>
    <input class="form-control" name="rent_note" type="text" id="rent_note" value="{{ isset($roomrent->rent_note) ? $roomrent->rent_note : ''}}" >
    {!! $errors->first('rent_note', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
