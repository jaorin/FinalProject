@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">สัญญาเช่า</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ url('/lease/create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูล
                        </a>
                        <form method="GET" action="{{ url('/lease') }}" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ค้นหา..."
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">เลขที่สัญญาเช่า</th>
                                    <th class="text-center">เลขห้องพัก</th>
                                    <th class="text-center">ชื่อผู้เช่า</th>
                                    <th class="text-center">วันที่ทำสัญญา</th>
                                    <th class="text-center">ค่าเช่าห้องพัก</th>
                                    <th class="text-center">ค่าจองห้องพัก</th>
                                    <th class="text-center">ค่ามัดจำห้องพัก</th>
                                    <th class="text-center">รวมจ่ายสุทธิ</th>
                                    <th class="text-center">การดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lease as $item)
                                <tr>
                                    <td class="text-center">{{ $item->Lease_Doc }}</td>
                                    <td class="text-center">{{ $item->room->NumberRoom}}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td class="text-center">{{ thaidate('j F Y', strtotime($item->DateLease)) }}</td>
                                    <td class="text-center">{{ $item->Room_Price }}</td>
                                    <td class="text-center">{{ $item->Booking_Price }}</td>
                                    <td class="text-center">{{ $item->Deposit_Price }}</td>
                                    <td class="text-center">{{ $item->Net_Pay }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/lease/' . $item->id) }}" title="ดูข้อมูล"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> ดูข้อมูล
                                        </a>
                                        <a href="{{ url('/lease/' . $item->id . '/edit') }}" title="แก้ไขข้อมูล"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-pencil-alt"></i> แก้ไขข้อมูล
                                        </a>
                                        <form method="POST" action="{{ url('/lease' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="ลบ"
                                                onclick="return confirm('ยืนยันการลบ?')">
                                                <i class="fas fa-trash-alt"></i> ลบ
                                            </button>
                                        </form>
                                        <a href="{{ url('/room/' . $item->room->id . '/edit') }}" title="แก้ไขข้อมูล">
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa fa-sign-out-alt" aria-hidden="true"></i> ย้ายเข้า
                                        </button></a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper mt-3 pagination-icon ">
                    {{ $lease->links('pagination::simple-bootstrap-4') }}
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