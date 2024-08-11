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
                        <a href="{{ url('/report/create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูล
                        </a>
                        <form method="GET" action="{{ route('report.index') }}" accept-charset="UTF-8" class="form-inline">
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
                                    <th class="text-center">การดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->leases->room->NumberRoom }}</td>
                                    <td class="text-center">{{ $item->DateInvoices }}</td>
                                    <td class="text-center">{{ $item->Pay_Date }}</td>
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
                                    <td class="text-center">
                                        <a href="{{ url('/report/' . $item->id) }}" title="ดูข้อมูล"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true"></i> ดูข้อมูล
                                        </a>
                                        <a href="{{ url('/report/' . $item->id . '/edit') }}" title="แก้ไขข้อมูล"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-pencil-alt" ></i> แก้ไขข้อมูล
                                        </a>

                                        <form method="POST" action="{{ url('/report' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="ลบ"
                                                onclick="return confirm(&quot;ยืนยันการลบ?&quot;)">
                                                <i class="fa fa-trash-alt"></i> ลบ
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper">
                        {!! $invoices->appends(['search' => Request::get('search')])->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
