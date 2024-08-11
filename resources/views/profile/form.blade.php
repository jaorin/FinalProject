<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'ชื่อ' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'อีเมล' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
@if( Auth::user()->role_id == '1')
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'รหัสผ่าน' }}</label>
    <input class="form-control" name="password" type="password" id="password"
        value="{{ isset($user->password) ? $user->password : ''}}" required>
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'อายุ' }}</label>
    <input class="form-control" name="age" type="number" id="age" value="{{ isset($user->age) ? $user->age : ''}}" >
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    <label for="gender" class="control-label">{{ 'เพศ' }}</label>
    <input class="form-control" name="gender" type="text" id="gender" value="{{ isset($user->gender) ? $user->gender : ''}}" >
    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'เบอร์โทร' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($user->phone) ? $user->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
@if( Auth::user()->role_id == '1')
<div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
    <label for="role_id" class="control-label">{{ 'สถานะ' }}</label>
    <select name="role_id" class="form-control" id="role_id" >
    @foreach (json_decode('{"1":"Admin","2":"Guest"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($user->role_id) && $user->role_id == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
</div>
@endif


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>
