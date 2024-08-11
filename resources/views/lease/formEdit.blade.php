
<div class="form-group {{ $errors->has('RoomID') ? 'has-error' : ''}}">
    <label for="RoomID" class="control-label">{{ 'เลขห้องพัก' }}</label>
    
    <select class="form-control" name="RoomID" id="RoomID" required id="roomSelect" 
    onchange="showMeter_Electricity(),showMeter_Water(),leasemaxid()">
        <option selected disabled value="">--ห้อง--</option>
        @foreach($rooms as $room)
        @php
        $RoomID = isset($lease->RoomID) ? $lease->RoomID : '';
        @endphp
        <option value="{{$room->id}}" {{$room->id == $RoomID ? "selected" : ""}}>{{ $room->NumberRoom }}</option>
        @endforeach
    </select>
    {!! $errors->first('RoomID', '<p class="help-block">:message</p>') !!}
</div>





<div class="form-group {{ $errors->has('Usersid') ? 'has-error' : ''}}">
    <label for="Usersid" class="control-label">{{ 'รหัสผู้ใช้งาน' }}</label>
    <input class="form-control" name="Usersid" type="number" id="Usersid"
        value="{{ isset($lease->Usersid) ? $lease->Usersid : ''}}">
    {!! $errors->first('Usersid', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('DateLease') ? 'has-error' : ''}}">
    <label for="DateLease" class="control-label">{{ 'วันที่ทำสัญญา' }}</label>
    <?php
    $dateLease = isset($invoice->DateLease)
        ? \Carbon\Carbon::parse($invoice->DateLease)->format('Y-m-d')
        : \Carbon\Carbon::now('Asia/Bangkok')->format('Y-m-d');
    ?>
    <input class="form-control" name="DateLease" type="date" id="DateLease" value="{{ $dateLease }}">
    {!! $errors->first('DateLease', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group {{ $errors->has('Room_Price') ? 'has-error' : ''}}">
    <label for="Room_Price" class="control-label">{{ 'ค่าเช่าห้องพัก' }}</label>
    <input class="form-control" name="Room_Price" type="number" id="Room_Price"
        value="{{ isset($lease->Room_Price) ? $lease->Room_Price : ''}}">
    {!! $errors->first('Room_Price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Booking_Price') ? 'has-error' : ''}}">
    <label for="Booking_Price" class="control-label">{{ 'ค่าจองห้องพัก' }}</label>
    <input class="form-control" name="Booking_Price" type="number" id="Booking_Price"
        value="{{ isset($lease->Booking_Price) ? $lease->Booking_Price : ''}}">
    {!! $errors->first('Booking_Price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Deposit_Price') ? 'has-error' : ''}}">
    <label for="Deposit_Price" class="control-label">{{ 'ค่ามัดจำห้องพัก' }}</label>
    <input class="form-control" name="Deposit_Price" type="number" id="Deposit_Price"
        value="{{ isset($lease->Deposit_Price) ? $lease->Deposit_Price : ''}}">
    {!! $errors->first('Deposit_Price', '<p class="help-block">:message</p>') !!}
</div>



<!-- Calculate Net_Pay and LeaseTotal using JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the input fields
        var roomPriceInput = document.getElementById('Room_Price');
        var bookingPriceInput = document.getElementById('Booking_Price');
        var depositPriceInput = document.getElementById('Deposit_Price');
        var netPayInput = document.getElementById('Net_Pay');
        var leaseTotalInput = document.getElementById('LeaseTotal');

        // Function to calculate Net_Pay and LeaseTotal
        function calculateNetPayAndLeaseTotal() {
            var roomPrice = parseFloat(roomPriceInput.value) || 0;
            var bookingPrice = parseFloat(bookingPriceInput.value) || 0;
            var depositPrice = parseFloat(depositPriceInput.value) || 0;

            var netPay = roomPrice + bookingPrice + depositPrice;
            netPayInput.value = netPay.toFixed(2); // Display Net_Pay with 2 decimal places

            // Set LeaseTotal to the same value as Net_Pay
            leaseTotalInput.value = netPay.toFixed(2); // Display LeaseTotal with 2 decimal places
        }

        // Add an event listener to each input field
        roomPriceInput.addEventListener('input', calculateNetPayAndLeaseTotal);
        bookingPriceInput.addEventListener('input', calculateNetPayAndLeaseTotal);
        depositPriceInput.addEventListener('input', calculateNetPayAndLeaseTotal);

        // Initial calculation
        calculateNetPayAndLeaseTotal();
    });
</script>

<div class="form-group {{ $errors->has('Net_Pay') ? 'has-error' : ''}}">
    <label for="Net_Pay" class="control-label">{{ 'รวมจ่ายสุทธิ' }}</label>
    <input class="form-control" name="Net_Pay" type="number" id="Net_Pay"
        value="{{ isset($lease->Net_Pay) ? $lease->Net_Pay : ''}}">
    {!! $errors->first('Net_Pay', '<p class="help-block">:message</p>') !!}
</div>




<!-- New_Water -->

<script>
  function showMeter_Water() {
    var roomID = document.getElementById("RoomID").value;
    var meterWater = document.getElementById("Meter_Water");
    
    // ใช้ค่า roomID จาก dropdown เพื่อค้นหาข้อมูลที่เกี่ยวข้องจากอาร์เรย์หรือวิธีอื่น ๆ
    var selectedRoom = {!! json_encode($rooms->keyBy('id')->toArray()) !!}[roomID];

    // ตรวจสอบว่าหากมีห้องที่ถูกเลือกจริงๆ ก็กำหนดค่าให้กับ meterWater
    if (selectedRoom) {
      meterWater.value = selectedRoom.New_Water;
    } else {
      meterWater.value = "";
    }
  }
</script>




<div class="form-group {{ $errors->has('Meter_Water') ? 'has-error' : ''}}">
    <label for="Meter_Water" class="control-label">{{ 'มิเตอร์น้ำเริ่มต้น' }}</label>
    <input class="form-control" name="Meter_Water" type="number" id="Meter_Water"
        value="{{ isset($lease->Meter_Water) ? $lease->Meter_Water : ''}}">
    {!! $errors->first('Meter_Water', '<p class="help-block">:message</p>') !!}
</div>



<!-- New_Water -->

<!-- New_Electricity -->

<script>
  function showMeter_Electricity() {
    var roomID = document.getElementById("RoomID").value;
    var meterElectricity = document.getElementById("Meter_Electricity");
    
    // ใช้ค่า roomID จาก dropdown เพื่อค้นหาข้อมูลที่เกี่ยวข้องจากอาร์เรย์หรือวิธีอื่น ๆ
    var selectedRoom = {!! json_encode($rooms->keyBy('id')->toArray()) !!}[roomID];

    // ตรวจสอบว่าหากมีห้องที่ถูกเลือกจริงๆ ก็กำหนดค่าให้กับ meterElectricity
    if (selectedRoom) {
      meterElectricity.value = selectedRoom.New_Electricity;
    } else {
      meterElectricity.value = "";
    }
  }
</script>


<div class="form-group {{ $errors->has('Meter_Electricity') ? 'has-error' : ''}}">
    <label for="Meter_Electricity" class="control-label">{{ 'มิเตอร์ไฟเริ่มต้น' }}</label>
    <input class="form-control" name="Meter_Electricity" type="number" id="Meter_Electricity"
        value="{{ isset($lease->Meter_Electricity) ? $lease->Meter_Electricity : ''}}">
    {!! $errors->first('Meter_Electricity', '<p class="help-block">:message</p>') !!}
</div>

<!-- New_Electricity -->

<div class="form-group {{ $errors->has('Lease_Doc') ? 'has-error' : ''}}">
    <label for="Lease_Doc" class="control-label">{{ 'สัญญาเช่า' }}</label>
    <input class="form-control" name="Lease_Doc" type="text" id="Lease_Doc"
        value="{{ isset($lease->Lease_Doc) ? $lease->Lease_Doc : $leasemaxid}}">
    {!! $errors->first('Lease_Doc', '<p class="help-block">:message</p>') !!}
</div>




<script>
function leasemaxid() {
    
        var d2 = $("#leasemaxid").val();
        $("#Lease_Doc").val=(d2);
  
}
</script>
<!-- <input for="" id="leasemaxid" value="{{ $leasemaxid }}" > -->

<!-- <div class="form-group {{ $errors->has('member_reg') ? 'has-error' : ''}}">
    <label for="member_reg" class="control-label">{{ 'ทะเบียนสมาชิก' }}</label>
    <input class="form-control" name="member_reg" type="text" id="member_reg"
        value="{{ isset($member->member_reg) ? $member->member_reg : ''}}" required>
    {!! $errors->first('member_reg', '<p class="help-block">:message</p>') !!}
</div> -->



<!-- <div class="form-group {{ $errors->has('Checkout') ? 'has-error' : ''}}">
    <label for="Checkout" class="control-label">{{ 'วันแจ้งย้ายออก' }}</label>
    <input class="form-control" name="Checkout" type="datetime-local" id="Checkout"
        value="{{ isset($lease->Checkout) ? $lease->Checkout : ''}}">
    {!! $errors->first('Checkout', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="form-group {{ $errors->has('LeaseTotal') ? 'has-error' : ''}}">
    <label for="LeaseTotal" class="control-label">{{ 'ยอดเงิน' }}</label>
    <input class="form-control" name="LeaseTotal" type="number" id="LeaseTotal"
        value="{{ isset($lease->Net_Pay) ? $lease->Net_Pay : ''}}">
    {!! $errors->first('LeaseTotal', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>