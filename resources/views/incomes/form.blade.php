<div class="form-group {{ $errors->has('Date') ? 'has-error' : ''}}">
    <label for="Date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="Date" type="datetime-local" id="Date" value="{{ isset($income->Date) ? $income->Date : ''}}" >
    {!! $errors->first('Date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Incomes') ? 'has-error' : ''}}">
    <label for="Incomes" class="control-label">{{ 'Incomes' }}</label>
    <input class="form-control" name="Incomes" type="number" id="Incomes" value="{{ isset($income->Incomes) ? $income->Incomes : ''}}" >
    {!! $errors->first('Incomes', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
    <label for="remark" class="control-label">{{ 'Remark' }}</label>
    <input class="form-control" name="remark" type="text" id="remark" value="{{ isset($income->remark) ? $income->remark : ''}}" >
    {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
