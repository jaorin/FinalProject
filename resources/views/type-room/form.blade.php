<div class="form-group {{ $errors->has('TypeRoomID') ? 'has-error' : ''}}">
    <label for="TypeRoomID" class="control-label">{{ 'ประเภทห้องพัก' }}</label>
    <input class="form-control" name="TypeRoomID" type="text" id="TypeRoomID" value="{{ isset($typeroom->TypeRoomID) ? $typeroom->TypeRoomID : ''}}" >
    {!! $errors->first('TypeRoomID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Price') ? 'has-error' : ''}}">
    <label for="Price" class="control-label">{{ 'ราคา' }}</label>
    <input class="form-control" name="Price" type="number" id="Price" value="{{ isset($typeroom->Price) ? $typeroom->Price : ''}}" >
    {!! $errors->first('Price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Booking') ? 'has-error' : ''}}">
    <label for="Booking" class="control-label">{{ 'ค่าจอง' }}</label>
    <input class="form-control" name="Booking" type="text" id="Booking" value="{{ isset($typeroom->Booking) ? $typeroom->Booking : ''}}" >
    {!! $errors->first('Booking', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('DepositBooking') ? 'has-error' : ''}}">
    <label for="DepositBooking" class="control-label">{{ 'ต่ามัดจำ' }}</label>
    <input class="form-control" name="DepositBooking" type="number" id="DepositBooking" value="{{ isset($typeroom->DepositBooking) ? $typeroom->DepositBooking : ''}}" >
    {!! $errors->first('DepositBooking', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Water') ? 'has-error' : ''}}">
    <label for="Water" class="control-label">{{ 'ค่าน้ำ / หน่วย' }}</label>
    <input class="form-control" name="Water" type="number" id="Water" value="{{ isset($typeroom->Water) ? $typeroom->Water : ''}}" >
    {!! $errors->first('Water', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Electricity') ? 'has-error' : ''}}">
    <label for="Electricity" class="control-label">{{ 'ค่าไฟ / ต่อหน่วย' }}</label>
    <input class="form-control" name="Electricity" type="number" id="Electricity" value="{{ isset($typeroom->Electricity) ? $typeroom->Electricity : ''}}" >
    {!! $errors->first('Electricity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Deposit') ? 'has-error' : ''}}">
    <label for="Deposit" class="control-label">{{ 'ค่าประกัน' }}</label>
    <input class="form-control" name="Deposit" type="number" id="Deposit" value="{{ isset($typeroom->Deposit) ? $typeroom->Deposit : ''}}" >
    {!! $errors->first('Deposit', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>
