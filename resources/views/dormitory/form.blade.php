<div class="form-group {{ $errors->has('Namedormi') ? 'has-error' : ''}}">
    <label for="Namedormi" class="control-label">{{ 'Namedormi' }}</label>
    <input class="form-control" name="Namedormi" type="text" id="Namedormi" value="{{ isset($dormitory->Namedormi) ? $dormitory->Namedormi : ''}}" >
    {!! $errors->first('Namedormi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Address') ? 'has-error' : ''}}">
    <label for="Address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="Address" type="text" id="Address" value="{{ isset($dormitory->Address) ? $dormitory->Address : ''}}" >
    {!! $errors->first('Address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Phone') ? 'has-error' : ''}}">
    <label for="Phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="Phone" type="text" id="Phone" value="{{ isset($dormitory->Phone) ? $dormitory->Phone : ''}}" >
    {!! $errors->first('Phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Bankaccount') ? 'has-error' : ''}}">
    <label for="Bankaccount" class="control-label">{{ 'Bankaccount' }}</label>
    <input class="form-control" name="Bankaccount" type="number" id="Bankaccount" value="{{ isset($dormitory->Bankaccount) ? $dormitory->Bankaccount : ''}}" >
    {!! $errors->first('Bankaccount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Logobank') ? 'has-error' : ''}}">
    <label for="Logobank" class="control-label">{{ 'Logobank' }}</label>
    <input class="form-control" name="Logobank" type="file" id="Logobank" value="{{ isset($dormitory->Logobank) ? $dormitory->Logobank : ''}}" >
    {!! $errors->first('Logobank', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Photo') ? 'has-error' : ''}}">
    <label for="Photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="Photo" type="file" id="Photo" value="{{ isset($dormitory->Photo) ? $dormitory->Photo : ''}}" >
    {!! $errors->first('Photo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
