<div class="form-group {{ $errors->has('Photo') ? 'has-error' : ''}}">
    <label for="Photo" class="control-label">{{ 'สลิปการโอน' }}</label>
    <input class="form-control" name="Photo" type="file" id="Photo" value="{{ isset($upload->Photo) ? $upload->Photo : ''}}" >
    {!! $errors->first('Photo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('DateUpload') ? 'has-error' : ''}}">
    <label for="DateUpload" class="control-label">{{ 'วันที่ / เวลา ที่โอน' }}</label>
    <?php
    $sevenDaysLater = \Carbon\Carbon::now('Asia/Bangkok')->addDays(7);
    $formattedDate = $sevenDaysLater->locale('th_TH')->isoFormat('YYYY-MM-DDTHH:mm');
    ?>
    <input class="form-control" name="DateUpload" type="datetime-local" id="DateUpload" value="{{ $formattedDate }}" >
    {!! $errors->first('DateUpload', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('NumberRoom') ? 'has-error' : ''}}">
    <label for="NumberRoom" class="control-label">{{ 'หมายเลขห้องพัก' }}</label>
    <input class="form-control" name="NumberRoom" type="number" id="NumberRoom" value="{{ isset($lease->room->NumberRoom) ? $lease->room->NumberRoom : ''}}" readonly>
    {!! $errors->first('NumberRoom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('LeaseID') ? 'has-error' : ''}}">
    <label for="LeaseID" class="control-label">{{ 'เลขที่สัญญา' }}</label>
    <input class="form-control" name="LeaseID" type="text" id="LeaseID" value="{{ isset($lease->id) ? $lease->id : ''}}" readonly>
    {!! $errors->first('LeaseID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Usersid') ? 'has-error' : ''}}">
    <label for="Usersid" class="control-label">{{ 'รหัสผู้เช่า' }}</label>
    <input class="form-control" name="Usersid" type="text" id="Usersid" value="{{ isset($upload->Usersid) ? $upload->Usersid : auth()->user()->id }}" readonly>
    {!! $errors->first('Usersid', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'แก้ไข' ? 'Update' : 'บันทึก' }}">
</div>
