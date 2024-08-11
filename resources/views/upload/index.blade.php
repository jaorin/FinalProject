@extends('layout.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">อัพโหลด</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- <a href="{{ url('/upload/create') }}" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มใหม่
                        </a> -->
                        <form method="GET" action="{{ url('/upload') }}" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" name="search" placeholder="ค้นหา..."
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button> -->
                            </div>
                    </div>
                    </form>
                

                <div class="table-responsive ">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">หมายเลขห้องพัก</th>
                                <th class="text-center">ชื่อผู้เช่า</th>
                                <th class="text-center">สลิปการโอน</th>
                                <th class="text-center">วัน/เวลาที่โอน</th>
                                <th class="text-center">การดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upload as $item)
                            <tr>
                                <td class="text-center">{{ $item->NumberRoom }}</td>
                                <td class="text-center">{{ $item->user->name }}</td>

                                <td class="text-center">
                                    <img src="{{ url('storage/'.$item->Photo )}}"
                                        style="width: 100px; height: 130px;" />
                                </td>


                                <td class="text-center">
                                    {{ thaidate('j F Y เวลา H:i น.', strtotime($item->DateUpload)) }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/upload/' . $item->id) }}" title="View Upload"
                                        class="btn btn-info btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i> ดูข้อมูล
                                    </a>

                                    <!-- <a href="{{ url('/fromUpload/') }}" title="View Upload"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-print" aria-hidden="true"></i> พิมพ์ใบเสร็จรับเงิน
                                    </a> -->

                                    @if( Auth::user()->role_id == '1')

                                    <!-- <a href="{{ url('/room/' . $item->leases->room->id . '/edit') }}"
                                            title="Edit Checkout"><button class="btn btn-warning btn-sm">
                                            <i class="fa fa-sign-out-alt" aria-hidden="true"></i> ชำระเงินแล้ว
                                        </button></a> -->
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper mt-3 pagination-icon">
                    {!! $upload->links('pagination::simple-bootstrap-4') !!}
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
</div>
@endsection