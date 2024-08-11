<div class="form-group {{ $errors->has('NumberRoom') ? 'has-error' : '' }}">
    <label for="NumberRoom" class="control-label">{{ 'เลขห้องพัก' }}</label>
    <select class="form-control" name="NumberRoom" id="NumberRoom"
        onchange="calculateWaterTotal(),calculateElectricityTotal(),calculateNetPay(), updateLeaseID()">
        <option value="">กรุณาเลือกเลขที่ห้องพัก</option>
        @foreach ($rooms->where('RoomStatus', 'มีผู้เช่า') as $room)
            <option value="{{ $room->NumberRoom }}" data-room-id="{{ $room->id }}">{{ $room->NumberRoom }}</option>
        @endforeach
    </select>
</div>





<div class="form-group {{ $errors->has('LeaseID') ? 'has-error' : ''}}">
    <label for="LeaseID" class="control-label">{{ 'เลขที่สัญญาเช่า' }}</label>
    <input class="form-control" name="LeaseID" type="number" id="LeaseID"
        value="{{ isset($invoice->LeaseID) ? $invoice->LeaseID : ''}}">
    {!! $errors->first('Lease_Doc', '<p class="help-block">:message</p>') !!}
</div>

<script>

function updateLeaseID() {
    var selectElement = document.getElementById('NumberRoom');
    var leaseIDInput = document.getElementById('LeaseID');
    var roomPriceInput = document.getElementById('Room_Price');
    // หา option ที่ถูกเลือก
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    
    // ดึงค่า data-room-id จาก option ที่ถูกเลือก
    var roomID = selectedOption.getAttribute('data-room-id');
    
    // ค้นหาค่า lease.id สูงสุดที่มี room.id เท่ากับ roomID
    var maxLeaseID = findMaxLeaseID(roomID);
    var RoomPrice = findRoomPrice(roomID);
    // ตั้งค่าค่า LeaseID ใน input
    leaseIDInput.value = maxLeaseID;
    roomPriceInput.value = RoomPrice;
}

// ฟังก์ชันสำหรับค้นหาค่า lease.id สูงสุดที่มี room.id เท่ากับ roomID
function findMaxLeaseID(roomID) {
    var maxLeaseID = 0;

    @foreach ($leases as $lease)
        if ({{ $lease->RoomID }} == roomID && {{ $lease->id }} > maxLeaseID) {
            maxLeaseID = {{ $lease->id }};
          
        }
    @endforeach

    return maxLeaseID;
}
function findRoomPrice(roomID) {
    var RoomPrice = 0;

    @foreach ($leases as $lease)
        if ({{ $lease->RoomID }} == roomID && {{ $lease->Room_Price }} > RoomPrice) {
            RoomPrice = {{ $lease->Room_Price }};
          
        }
    @endforeach

    return RoomPrice;
}

</script>


<div class="form-group {{ $errors->has('DateInvoices') ? 'has-error' : ''}}">
    <label for="DateInvoices" class="control-label">{{ 'วันที่ใบแจ้งหนี้' }}</label>
    <?php
    $dateInvoices = isset($invoice->DateInvoices)
        ? \Carbon\Carbon::parse($invoice->DateInvoices)->format('Y-m-d\TH:i')
        : \Carbon\Carbon::now('Asia/Bangkok')->format('Y-m-d\TH:i');
    ?>
    <input class="form-control" name="DateInvoices" type="datetime-local" id="DateInvoices" value="{{ $dateInvoices }}">
    {!! $errors->first('DateInvoices', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Date_Pay') ? 'has-error' : ''}}">
    <label for="Date_Pay" class="control-label">{{ 'วันแจ้งชำระเงิน' }}</label>
    <?php
    $datePay = isset($invoice->Date_Pay)
        ? \Carbon\Carbon::parse($invoice->Date_Pay)->format('Y-m-d\TH:i')
        : \Carbon\Carbon::now('Asia/Bangkok')->format('Y-m-d\TH:i');
    ?>
    <input class="form-control" name="Date_Pay" type="datetime-local" id="Date_Pay" value="{{ $datePay }}">
    {!! $errors->first('Date_Pay', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Pay_Date') ? 'has-error' : ''}}">
    <label for="Pay_Date" class="control-label">{{ 'กำหนดการจ่าย' }}</label>
    <?php
    $sevenDaysLater = \Carbon\Carbon::now('Asia/Bangkok')->addDays(7)->format('Y-m-d\TH:i');
    ?>
    <input class="form-control" name="Pay_Date" type="datetime-local" id="Pay_Date"
        value="{{ isset($invoice->Pay_Date) ? $invoice->Pay_Date : $sevenDaysLater }}">
    {!! $errors->first('Pay_Date', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Delay_Date') ? 'has-error' : ''}}">
    <label for="Delay_Date" class="control-label">{{ '' }}</label>
    <input class="form-control" name="Delay_Date" type="hidden" id="Delay_Date"
        value="{{ isset($invoice->Delay_Date) ? $invoice->Delay_Date : ''}}">
    {!! $errors->first('Delay_Date', '<p class="help-block">:message</p>') !!}
</div>


<script>
function calculateDelay() {
    var payDate = new Date(document.getElementById('Pay_Date').value);
    var now = new Date();
    var timeDiff = now.getTime() - payDate.getTime();
    var delay = Math.max(Math.ceil(timeDiff / (1000 * 60 * 60 * 24)), 0);
    
    // กำหนดค่า Delay_Date ใน input ชื่อ "Delay_Date"
    document.getElementById('Delay_Date').value = delay;

    var delayPrice = 0;
    if (delay >= 30) {
        delayPrice = 30 * 50; // คำนวณเฉพาะค่าของ Delay_Date ที่มากกว่าหรือเท่ากับ 30 วัน
    } else {
        delayPrice = delay * 50; // คำนวณเฉพาะค่าของ Delay_Date ที่น้อยกว่า 30 วัน
    }

    // กำหนดค่า Delay_Price ใน input ชื่อ "Delay_Price"
    document.getElementById('Delay_Price').value = delayPrice;

    // เรียกใช้งาน calculateNetPay เพื่อคำนวณ Net Pay ใหม่เมื่อมีการเปลี่ยนแปลงใน Delay_Price
    calculateNetPay();
}

// เรียกใช้งาน calculateDelay เมื่อมีการเปลี่ยนแปลงใน input Pay_Date
document.getElementById('Pay_Date').addEventListener('change', function () {
    calculateDelay();
});

// เมื่อหน้าเว็บโหลดเสร็จให้เรียกฟังก์ชัน calculateDelay
document.addEventListener('DOMContentLoaded', function () {
    calculateDelay();
});
</script>



<script>
var roomData = {
    @foreach($rooms as $room)
    '{{ $room->NumberRoom }}': {
        New_Water: '{{ $room->New_Water }}',
        New_Electricity: '{{ $room->New_Electricity }}'
    },
    @endforeach
};

document.getElementById('NumberRoom').addEventListener('change', function() {
    var selectedRoom = this.value;
    var waterOldInput = document.getElementById('Water_Old');
    var electricityOldInput = document.getElementById('Electricity_Old');

    if (roomData[selectedRoom]) {
        waterOldInput.value = roomData[selectedRoom].New_Water;
        electricityOldInput.value = roomData[selectedRoom].New_Electricity;
    } else {
        waterOldInput.value = ''; 
        electricityOldInput.value = ''; 
    }
});
</script>



<div class="form-group {{ $errors->has('Water_Old') ? 'has-error' : ''}}">
    <label for="Water_Old" class="control-label">{{ 'มิตเตอร์น้ำเก่า' }}</label>
    <input class="form-control" name="Water_Old" type="number" id="Water_Old"
        value="{{ isset($invoice->Water_Old) ? $invoice->Water_Old : ''}}">
    {!! $errors->first('Water_Old', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Water_New') ? 'has-error' : ''}}">
    <label for="Water_New" class="control-label">{{ 'มิตเตอร์น้ำใหม่' }}</label>
    <input class="form-control" name="Water_New" type="number" id="Water_New"
        value="{{ isset($invoice->Water_New) ? $invoice->Water_New : ''}}">
    {!! $errors->first('Water_New', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Water_Unit') ? 'has-error' : ''}}">
    <label for="Water_Unit" class="control-label">{{ 'จำนวนหน่วยที่ใช้' }}</label>
    <input class="form-control" name="Water_Unit" type="number" id="Water_Unit"
        value="{{ isset($invoice->Water_Unit) ? $invoice->Water_Unit : ''}}">
    {!! $errors->first('Water_Unit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Water_Perunit') ? 'has-error' : ''}}">
    <label for="Water_Perunit" class="control-label">{{ 'ค่าน้ำต่อหน่วย' }}</label>
    <select class="form-control" name="Water_Perunit" id="Water_Perunit">
        <option value="18" {{ isset($invoice->Water_Perunit) && $invoice->Water_Perunit == 18 ? 'selected' : '' }}>18</option>
        <option value="19" {{ isset($invoice->Water_Perunit) && $invoice->Water_Perunit == 19 ? 'selected' : '' }}>19</option>
        <option value="20" {{ isset($invoice->Water_Perunit) && $invoice->Water_Perunit == 20 ? 'selected' : '' }}>20</option>
        <option value="21" {{ isset($invoice->Water_Perunit) && $invoice->Water_Perunit == 21 ? 'selected' : '' }}>21</option>
        <option value="22" {{ isset($invoice->Water_Perunit) && $invoice->Water_Perunit == 22 ? 'selected' : '' }}>22</option>
        <option value="23" {{ isset($invoice->Water_Perunit) && $invoice->Water_Perunit == 23 ? 'selected' : '' }}>23</option>
        <option value="24" {{ isset($invoice->Water_Perunit) && $invoice->Water_Perunit == 24 ? 'selected' : '' }}>24</option>
        <option value="25" {{ isset($invoice->Water_Perunit) && $invoice->Water_Perunit == 25 ? 'selected' : '' }}>25</option>
    </select>
    {!! $errors->first('Water_Perunit', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Water_Total') ? 'has-error' : ''}}">
    <label for="Water_Total" class="control-label">{{ 'รวมค่าน้ำ ' }}</label>
    <input class="form-control" name="Water_Total" type="number" id="Water_Total"
        value="{{ isset($invoice->Water_Total) ? $invoice->Water_Total : ''}}">
    {!! $errors->first('Water_Total', '<p class="help-block">:message</p>') !!}
</div>

<script>
// เรียกฟังก์ชัน calculateWaterUnit เมื่อค่า Water_New, Water_Old, หรือ Water_Perunit เปลี่ยนแปลง
document.getElementById('Water_New').addEventListener('input', calculateWaterTotal);
document.getElementById('Water_Old').addEventListener('input', calculateWaterTotal);
document.getElementById('Water_Perunit').addEventListener('input', calculateWaterTotal);

function calculateWaterTotal() {
    // ดึงค่า Water_New และ Water_Old จากฟอร์ม
    var waterNew = parseFloat(document.getElementById('Water_New').value);
    var waterOld = parseFloat(document.getElementById('Water_Old').value);

    // คำนวณค่า Water_Unit โดยลบ Water_Old ออกจาก Water_New
    var waterUnit = isNaN(waterNew) || isNaN(waterOld) ? 0 : waterNew - waterOld;

    // แสดงผลลัพธ์ในฟิลด์ Water_Unit
    document.getElementById('Water_Unit').value = waterUnit;

    // ดึงค่า Water_Perunit จากฟอร์ม
    var waterPerunit = parseFloat(document.getElementById('Water_Perunit').value);

    // คำนวณค่า Water_Total โดยคูณ Water_Unit กับ Water_Perunit
    var waterTotal = isNaN(waterUnit) || isNaN(waterPerunit) ? 0 : waterUnit * waterPerunit;

    // แสดงผลลัพธ์ในฟิลด์ Water_Total
    document.getElementById('Water_Total').value = waterTotal;
}

// คำนวณค่าเริ่มต้นเมื่อหน้าเว็บโหลด
calculateWaterTotal();
</script>


<div class="form-group {{ $errors->has('Electricity_Old') ? 'has-error' : ''}}">
    <label for="Electricity_Old" class="control-label">{{ 'มิตเตอร์ไฟเก่า' }}</label>
    <input class="form-control" name="Electricity_Old" type="number" id="Electricity_Old"
        value="{{ isset($invoice->Electricity_Old) ? $invoice->Electricity_Old : ''}}">
    {!! $errors->first('Electricity_Old', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Electricity_New') ? 'has-error' : ''}}">
    <label for="Electricity_New" class="control-label">{{ 'มิตเตอร์ไฟใหม่' }}</label>
    <input class="form-control" name="Electricity_New" type="number" id="Electricity_New"
        value="{{ isset($invoice->Electricity_New) ? $invoice->Electricity_New : ''}}">
    {!! $errors->first('Electricity_New', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Electricity_Unit') ? 'has-error' : ''}}">
    <label for="Electricity_Unit" class="control-label">{{ 'จำนวนหน่วยที่ใช้' }}</label>
    <input class="form-control" name="Electricity_Unit" type="number" id="Electricity_Unit"
        value="{{ isset($invoice->Electricity_Unit) ? $invoice->Electricity_Unit : ''}}">
    {!! $errors->first('Electricity_Unit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Electricity_Perunit') ? 'has-error' : ''}}">
    <label for="Electricity_Perunit" class="control-label">{{ 'ค่าไฟต่อหน่วย' }}</label>
    <select class="form-control" name="Electricity_Perunit" id="Electricity_Perunit">
        <option value="5" {{ isset($invoice->Electricity_Perunit) && $invoice->Electricity_Perunit == 5 ? 'selected' : '' }}>5</option>
        <option value="6" {{ isset($invoice->Electricity_Perunit) && $invoice->Electricity_Perunit == 6 ? 'selected' : '' }}>6</option>
        <option value="7" {{ isset($invoice->Electricity_Perunit) && $invoice->Electricity_Perunit == 7 ? 'selected' : '' }}>7</option>
        <option value="8" {{ isset($invoice->Electricity_Perunit) && $invoice->Electricity_Perunit == 8 ? 'selected' : '' }}>8</option>
        <option value="9" {{ isset($invoice->Electricity_Perunit) && $invoice->Electricity_Perunit == 9 ? 'selected' : '' }}>9</option>
        <option value="10" {{ isset($invoice->Electricity_Perunit) && $invoice->Electricity_Perunit == 10 ? 'selected' : '' }}>10</option>
    </select>
    {!! $errors->first('Electricity_Perunit', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Electricity_Total') ? 'has-error' : ''}}">
    <label for="Electricity_Total" class="control-label">{{ 'รวมค่าไฟ' }}</label>
    <input class="form-control" name="Electricity_Total" type="number" id="Electricity_Total"
        value="{{ isset($invoice->Electricity_Total) ? $invoice->Electricity_Total : ''}}">
    {!! $errors->first('Electricity_Total', '<p class="help-block">:message</p>') !!}
</div>

<script>
// เรียกฟังก์ชัน calculateWaterUnit เมื่อค่า Water_New, Water_Old, หรือ Water_Perunit เปลี่ยนแปลง
document.getElementById('Electricity_New').addEventListener('input', calculateElectricityTotal);
document.getElementById('Electricity_Old').addEventListener('input', calculateElectricityTotal);
document.getElementById('Electricity_Perunit').addEventListener('input', calculateElectricityTotal);

function calculateElectricityTotal() {
    // ดึงค่า Water_New และ Water_Old จากฟอร์ม
    var ElectricityNew = parseFloat(document.getElementById('Electricity_New').value);
    var ElectricityOld = parseFloat(document.getElementById('Electricity_Old').value);

    // คำนวณค่า Water_Unit โดยลบ Water_Old ออกจาก Water_New
    var ElectricityUnit = isNaN(ElectricityNew) || isNaN(ElectricityOld) ? 0 : ElectricityNew - ElectricityOld;

    // แสดงผลลัพธ์ในฟิลด์ Water_Unit
    document.getElementById('Electricity_Unit').value = ElectricityUnit;

    // ดึงค่า Water_Perunit จากฟอร์ม
    var ElectricityPerunit = parseFloat(document.getElementById('Electricity_Perunit').value);

    // คำนวณค่า Water_Total โดยคูณ Water_Unit กับ Water_Perunit
    var ElectricityTotal = isNaN(ElectricityUnit) || isNaN(ElectricityPerunit) ? 0 : ElectricityUnit *
        ElectricityPerunit;

    document.getElementById('Electricity_Total').value = ElectricityTotal;
}

// คำนวณค่าเริ่มต้นเมื่อหน้าเว็บโหลด
calculateElectricityTotal();
</script>


<div class="form-group {{ $errors->has('Room_Price') ? 'has-error' : ''}}">
    <label for="Room_Price" class="control-label">{{ 'ค่าเช่าห้อง' }}</label>
    <input class="form-control" name="Room_Price" type="number" id="Room_Price"
        value="{{ isset($invoice->Room_Price) ? $invoice->Room_Price : ''}}">
    {!! $errors->first('Room_Price', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('Net_Pay') ? 'has-error' : ''}}">
    <label for="Net_Pay" class="control-label">{{ 'ยอดจ่ายสุทธิ' }}</label>
    <input class="form-control" name="Net_Pay" type="number" id="Net_Pay"
        value="{{ isset($invoice->Net_Pay) ? $invoice->Net_Pay : ''}}">
    {!! $errors->first('Net_Pay', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Delay_Price') ? 'has-error' : ''}}">
    <label for="Delay_Price" class="control-label">{{ '' }}</label>
    <input class="form-control" name="Delay_Price" type="hidden" id="Delay_Price"
        value="{{ isset($invoice->Delay_Price) ? $invoice->Delay_Price : ''}}">
    {!! $errors->first('Delay_Price', '<p class="help-block">:message</p>') !!}
</div>


<script>
function calculateWaterTotal() {
    var waterNew = parseFloat(document.getElementById('Water_New').value);
    var waterOld = parseFloat(document.getElementById('Water_Old').value);
    var waterPerunit = parseFloat(document.getElementById('Water_Perunit').value);

    var waterUnit = isNaN(waterNew) || isNaN(waterOld) ? 0 : waterNew - waterOld;
    var waterTotal = isNaN(waterUnit) || isNaN(waterPerunit) ? 0 : waterUnit * waterPerunit;

    document.getElementById('Water_Total').value = waterTotal;
    calculateNetPay();
}

function calculateElectricityTotal() {
    var electricityNew = parseFloat(document.getElementById('Electricity_New').value);
    var electricityOld = parseFloat(document.getElementById('Electricity_Old').value);
    var electricityPerunit = parseFloat(document.getElementById('Electricity_Perunit').value);

    var electricityUnit = isNaN(electricityNew) || isNaN(electricityOld) ? 0 : electricityNew - electricityOld;
    var electricityTotal = isNaN(electricityUnit) || isNaN(electricityPerunit) ? 0 : electricityUnit *
        electricityPerunit;

    document.getElementById('Electricity_Total').value = electricityTotal;
    calculateNetPay();
}

function calculateNetPay() {
    var waterTotal = parseFloat(document.getElementById('Water_Total').value);
    var electricityTotal = parseFloat(document.getElementById('Electricity_Total').value);
    var roomPrice = parseFloat(document.getElementById('Room_Price').value);
    var delayPrice = parseFloat(document.getElementById('Delay_Price').value); 

    var netPay = waterTotal + electricityTotal + roomPrice + delayPrice; 

    document.getElementById('Net_Pay').value = netPay;
}
    document.addEventListener('DOMContentLoaded', function () {
        calculateNetPay();
    });
// เรียกใช้งานฟังก์ชันครั้งแรกเมื่อหน้าเว็บโหลด
calculateNetPay();

  // เรียกใช้งานฟังก์ชัน calculateNetPay ทุกครั้งที่มีการเปลี่ยนแปลงในฟิลด์ Water_New, Water_Old, Water_Perunit, Electricity_New, Electricity_Old, Electricity_Perunit, และ Room_Price
  document.getElementById('Water_New').addEventListener('input', function() {
        calculateWaterTotal();
        calculateNetPay();
    });

    document.getElementById('Water_Old').addEventListener('input', function() {
        calculateWaterTotal();
        calculateNetPay();
    });

    document.getElementById('Water_Perunit').addEventListener('input', function() {
        calculateWaterTotal();
        calculateNetPay();
    });

    document.getElementById('Electricity_New').addEventListener('input', function() {
        calculateElectricityTotal();
        calculateNetPay();
    });

    document.getElementById('Electricity_Old').addEventListener('input', function() {
        calculateElectricityTotal();
        calculateNetPay();
    });

    document.getElementById('Electricity_Perunit').addEventListener('input', function() {
        calculateElectricityTotal();
        calculateNetPay();
    });

    document.getElementById('Room_Price').addEventListener('input', function() {
        calculateNetPay();
    });
</script>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>