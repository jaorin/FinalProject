@extends('layout.main')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">ใบแจ้งหนี้</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    @if( Auth::user()->role_id == '1')
                        <a href="{{ url('/invoices/create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูล
                        </a>
                    @endif
                        <form method="GET" action="{{ url('/invoices') }}" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ค้นหา..."
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fas fa-search"></i> ค้นหา
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive ">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">ค่าเช่าประจำเดือน</th>
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
                                    @if( Auth::user()->role_id == '1')
                                    <th class="text-center">การดำเนินการ</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $item)
                                <tr>
                                    <td class="text-center">{{ thaidate('F Y', strtotime($item->DateInvoices)) }}</td>
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
                                    <td class="text-center">{{ number_format($item->Water_Total, 2) }}</td>
                                    <td class="text-center">{{ $item->Electricity_Old }}</td>
                                    <td class="text-center">{{ $item->Electricity_New }}</td>
                                    <td class="text-center">{{ $item->Electricity_Unit }}</td>
                                    <td class="text-center">{{ number_format($item->Electricity_Total, 2) }}</td>
                                    <td class="text-center">{{ number_format($item->Room_Price, 2) }}</td>
                                    <td class="text-center">{{ number_format($item->Net_Pay, 2) }}</td>
                                    @if( Auth::user()->role_id == '1')
                                    <td class="text-center">
                                        <a href="{{ url('/invoices/' . $item->id) }}" title="ดูข้อมูล"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true"></i> ดูข้อมูล
                                        </a>
                                        <a href="{{ url('/invoices/' . $item->id . '/edit') }}" title="แก้ไขข้อมูล"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-pencil-alt"></i> แก้ไขข้อมูล
                                        </a>

                                        <form method="POST" action="{{ url('/invoices' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="ลบ"
                                                onclick="return confirm(&quot;ยืนยันการลบ?&quot;)">
                                                <i class="fa fa-trash-alt"></i> ลบ
                                            </button>
                                        </form>
                                    </td>
                                    @endif
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