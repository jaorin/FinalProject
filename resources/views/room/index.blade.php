@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">ข้อมูลห้องพัก</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    @if( Auth::user()->role_id == '1')
                        <a href="{{ url('/room/create') }}" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                        </a>
                    @endif
                        <form method="GET" action="{{ url('/room') }}" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ค้นหา..."
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">เลขห้อง</th>
                                    <th class="text-center">ชั้น</th>
                                    @if( Auth::user()->role_id == '1')
                                    <th class="text-center">มิเตอร์น้ำล่าสุด</th>
                                    <th class="text-center">มิเตอร์ไฟล่าสุด</th>
                                    @endif
                                    <th class="text-center">สถานะ</th>
                                    @if( Auth::user()->role_id == '1')
                                    <th class="text-center">สถานะการชำระ</th>
                                    <th class="text-center">การดำเนินการ</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($room as $item)
                                <tr>
                                    <td class="text-center">{{ $item->NumberRoom }}</td>
                                    <td class="text-center">{{ $item->Floor }}</td>
                                    @if( Auth::user()->role_id == '1')
                                    <td class="text-center">{{ $item->New_Water }}</td>
                                    <td class="text-center">{{ $item->New_Electricity }}</td>
                                    @endif
                                    <td class="text-center">{{ $item->RoomStatus }}</td>
                                    @if( Auth::user()->role_id == '1')
                                    <td class="text-center">{{ $item->PayStatus }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/room/' . $item->id) }}" title="ดูข้อมูล"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i> ดูข้อมูล
                                        </a>
                                        <a href="{{ url('/room/' . $item->id . '/edit') }}" title="แก้ไขข้อมูล"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-alt"></i> แก้ไข
                                        </a>
                                        <form method="POST" action="{{ url('/room' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="ลบ"
                                                onclick="return confirm('ยืนยันการลบ?')">
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
                    {{ $room->links('pagination::simple-bootstrap-4') }}
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