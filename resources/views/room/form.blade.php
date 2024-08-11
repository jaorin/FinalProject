<div class="form-group {{ $errors->has('NumberRoom') ? 'has-error' : ''}}">
    <label for="NumberRoom" class="control-label">{{ 'เลขห้อง' }}</label>
    <input class="form-control" name="NumberRoom" type="text" id="NumberRoom" value="{{ isset($room->NumberRoom) ? $room->NumberRoom : ''}}" >
    {!! $errors->first('NumberRoom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Floor') ? 'has-error' : ''}}">
    <label for="Floor" class="control-label">{{ 'ชั้น' }}</label>
    <input class="form-control" name="Floor" type="text" id="Floor" value="{{ isset($room->Floor) ? $room->Floor : ''}}" >
    {!! $errors->first('Floor', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('New_Water') ? 'has-error' : ''}}">
    <label for="New_Water" class="control-label">{{ 'มิเตอร์น้ำล่าสุด' }}</label>
    <input class="form-control" name="New_Water" type="number" id="New_Water" value="{{ isset($room->New_Water) ? $room->New_Water : ''}}" >
    {!! $errors->first('New_Water', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('New_Electricity') ? 'has-error' : ''}}">
    <label for="New_Electricity" class="control-label">{{ 'มิเตอร์ไฟล่าสุด' }}</label>
    <input class="form-control" name="New_Electricity" type="number" id="New_Electricity" value="{{ isset($room->New_Electricity) ? $room->New_Electricity : ''}}" >
    {!! $errors->first('New_Electricity', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Room_Price') ? 'has-error' : ''}}">
    <label for="Room_Price" class="control-label">{{ 'ค่าเช่าห้องพัก' }}</label>
    <input class="form-control" name="Room_Price" type="text" id="Room_Price" value="{{ isset($room->Room_Price) ? $room->Room_Price : ''}}" >
    {!! $errors->first('Room_Price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Booking_Price') ? 'has-error' : ''}}">
    <label for="Booking_Price" class="control-label">{{ 'ค่าจองห้องพัก' }}</label>
    <input class="form-control" name="Booking_Price" type="text" id="Booking_Price" value="{{ isset($room->Booking_Price) ? $room->Booking_Price : ''}}" >
    {!! $errors->first('Booking_Price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Deposit_Price') ? 'has-error' : ''}}">
    <label for="Deposit_Price" class="control-label">{{ 'ค่ามัดจำห้องพัก' }}</label>
    <input class="form-control" name="Deposit_Price" type="text" id="Deposit_Price" value="{{ isset($room->Deposit_Price) ? $room->Deposit_Price : ''}}" >
    {!! $errors->first('Deposit_Price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('RoomStatus') ? 'has-error' : ''}}">
    <label for="RoomStatus" class="control-label">{{ 'สถานะ/ห้องพัก' }}</label>
    <select name="RoomStatus" class="form-control" id="RoomStatus" >
    @foreach (json_decode('{"ว่าง":"ว่าง","มีผู้เช่า":"มีผู้เช่า"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($account->RoomStatus) && $account->RoomStatus == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('RoomStatus', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('PayStatus') ? 'has-error' : ''}}">
    <label for="PayStatus" class="control-label">{{ 'สถานะการชำระ' }}</label>
    <select name="PayStatus" class="form-control" id="PayStatus" >
    @foreach (json_decode('{"ยังไม่ได้ชำระ":"ยังไม่ได้ชำระ","ชำระเรียบร้อย":"ชำระเรียบร้อย"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($account->PayStatus) && $account->PayStatus == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('PayStatus', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>
