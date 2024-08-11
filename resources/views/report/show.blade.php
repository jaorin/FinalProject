@extends('layout.main')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body" id="printableArea">
                @if ($invoice)

                <h3><b>ใบแจ้งหนี้</b> <span class="pull-right">{{ $invoice->id }} ห้องที่
                        {{ $invoice->leases->room->NumberRoom }}</span></h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <h3><b class="text-danger">หอพักอยู่เจริญ</b></h3>
                            <p class="text-muted ms-0">
                                เลขที่ 348 หมู่ 2 <br>
                                ต.สามเรือน อ.บางปะอิน <br>
                                จ.พระนครศรีอยุธยา <br>
                                รหัสไปรษณีย์ 13160
                            </p>
                        </address>
                    </div>
                    <div class="col-md-6 text-end">
                        <address>
                            <h3>ถึง</h3>
                            <h4 class="font-bold">ผู้ทำสัญญา คุณ {{ $invoice->leases->user->name }}</h4>
                            <h5 class="font-bold">ห้องที่ {{ $invoice->leases->room->NumberRoom }}</h5>
                            <h6 class="font-bold">ทำสัญญาเมื่อวันที่ {{ $invoice->leases->DateLease }}</h6>
                            <p class="mt-4">
                                <b>วันที่ออกใบแจ้งหนี้ :</b>
                                <i class="mdi mdi-calendar"></i> {{ $invoice->DateInvoices }}
                            </p>
                            <p>
                                <b>วันที่เกินกำหนดชำระ :</b>
                                <i class="mdi mdi-calendar"></i> {{ $invoice->Pay_Date }}
                            </p>
                        </address>
                    </div>
                </div>
                <div class="table-responsive mt-5">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">รายการ</th>
                                <th>ชื่อรายการ</th>
                                <th class="text-end">หน่วยเก่า</th>
                                <th class="text-end">หน่วยใหม่</th>
                                <th class="text-end">จำนวนทั้งหมด</th>
                                <th class="text-end">ยอดเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>ค่าเช่าห้อง</td>
                                <td class="text-end"> - </td>
                                <td class="text-end"> - </td>
                                <td class="text-end">{{ $invoice->Room_Price }}</td>
                                <td class="text-end">{{ $invoice->Room_Price }} บาท</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>ค่าน้ำประปา</td>
                                <td class="text-end">{{ $invoice->Water_Old }}</td>
                                <td class="text-end">{{ $invoice->Water_New }}</td>
                                <td class="text-end">{{ $invoice->Water_Unit }}</td>
                                <td class="text-end">{{ $invoice->Water_Total }} บาท</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>ค่าไฟฟ้า</td>
                                <td class="text-end">{{ $invoice->Electricity_Old }}</td>
                                <td class="text-end">{{ $invoice->Electricity_New }}</td>
                                <td class="text-end">{{ $invoice->Electricity_Unit }}</td>
                                <td class="text-end">{{ $invoice->Electricity_Total }} บาท</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-end">
                    <h3><b>รวมจ่ายสุทธิ : </b>{{ $invoice->Net_Pay }} บาท</h3>
                </div>
                @else
                <!-- กรณีไม่พบใบแจ้งหนี้ -->
                <p>ไม่พบใบแจ้งหนี้สำหรับผู้ใช้งานปัจจุบัน</p>
                @endif
            </div>
            @if( Auth::user()->role_id == '1')
            <div class="text-end mt-4">
                <button class="btn btn-danger text-white" type="button" onclick="printReport()">พิมพ์ใบแจ้งหนี้</button>
            </div>
            @endif
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("tbody tr:even").css("background-color", "#f2f2f2");
});

function printReport() {
    var printContents = document.getElementById('printableArea').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>



<style>
.card {
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.card-header {
    background-color: #007bff;
    color: #fff;
}

.btn {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
}
</style>
<style>
@media print {
    body * {
        visibility: hidden;
    }

    #printableArea,
    #printableArea * {
        visibility: visible;
    }

    #printableArea {
        position: static;
        width: 100%;
    }

    @page {
        size: auto;
        margin: 0;
    }
}
</style>
@endsection