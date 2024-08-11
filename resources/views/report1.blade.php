@extends('layout.main')

@section('content')

<style>
#fbody {
    font-size: 14px;
}

@media print {
    #hid {
        display: none;
        /* ซ่อน  */
    }

}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">รายงานรายได้ประจำเดือน</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <form action="report1" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <div class="row ml-5">
                                    <label for="from " class="control-label">ตั้งแต่วันที่ : </label>
                                    <input type="date" class="form-control input-sm" id="from" name="from">
                                </div>

                                <div class="row ml-5">
                                    <label for="to " class="control-label">ถึงวันที่ : </label>
                                    <input type="date" class="form-control input-sm" id="to" name="to">
                                </div>

                                <div class="col-md-2">
                                    <br>

                                    <button type="submit" id="print" class="btn btn-success mt-2" name="search"><i
                                            class="fa fa-print"></i> พิมพ์
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">เลขที่ใบสัญญาเช่า</th>
                                    <th class="text-center">หมายเลขห้องพัก</th>
                                    <th class="text-center">วันแจ้งชำระเงิน</th>
                                    <th class="text-center">กำหนดการจ่าย</th>
                                    <th class="text-center">มิตเตอร์น้ำเก่า</th>
                                    <th class="text-center">มิตเตอร์น้ำใหม่</th>
                                    <th class="text-center">จำนวนหน่วยที่ใช้</th>
                                    <th class="text-center">รวมค่าน้ำ</th>
                                    <th class="text-center">มิตเตอร์ไฟเก่า</th>
                                    <th class="text-center">มิตเตอร์ไฟใหม่</th>
                                    <th class="text-center">จำนวนหน่วย</th>
                                    <th class="text-center">รวมค่าไฟ</th>
                                    <th class="text-center">ค่าเช่าห้อง</th>
                                    <th class="text-center">ยอดจ่ายสุทธิ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">
                                        @if($item->leases && $item->leases->room)
                                        {{ $item->leases->room->NumberRoom }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td class="text-center">{{ thaidate('j F Y', strtotime($item->DateInvoices)) }}</td>
                                    <td class="text-center">{{ thaidate('j F Y', strtotime($item->Pay_Date)) }}</td>
                                    <td class="text-center">{{ $item->Water_Old }}</td>
                                    <td class="text-center">{{ $item->Water_New }}</td>
                                    <td class="text-center">{{ $item->Water_Unit }}</td>
                                    <td class="text-center">{{ $item->Water_Total }}</td>
                                    <td class="text-center">{{ $item->Electricity_Old }}</td>
                                    <td class="text-center">{{ $item->Electricity_New }}</td>
                                    <td class="text-center">{{ $item->Electricity_Unit }}</td>
                                    <td class="text-center">{{ $item->Electricity_Total }}</td>
                                    <td class="text-center">{{ $item->Room_Price }}</td>
                                    <td class="text-center">{{ $item->Net_Pay }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper mt-3 pagination-icon ">
                        {{ $invoices->links('pagination::simple-bootstrap-4') }}
                    </div>

                    <style>
                    .pagination-wrapper .pagination {
                        display: flex;
                        justify-content: space-between;
                    }
                    </style>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection