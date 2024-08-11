@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">ข้อมูลผู้ใช้งาน</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ url('/profile/create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูล
                        </a>
                        <form method="GET" action="{{ url('/profile') }}" accept-charset="UTF-8" class="form-inline">
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
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">หมายเลขผู้เช่า</th>
                                    <th class="text-center">ชื่อ</th>
                                    <th class="text-center">อีเมล</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">อายุ</th>
                                    <th class="text-center">เพศ</th>
                                    <th class="text-center">เบอร์โทร</th>
                                    <th class="text-center">การดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role->role_name }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/profile/' . $item->id) }}" title="ดูข้อมูล"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> ดูข้อมูล
                                        </a>
                                        <a href="{{ url('/profile/' . $item->id . '/edit') }}" title="แก้ไขข้อมูล"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-pencil-alt"></i> แก้ไขข้อมูล
                                        </a>
                                        <form method="POST" action="{{ url('/profile' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="ลบ"
                                                onclick="return confirm('ยืนยันการลบ?')">
                                                <i class="fas fa-trash-alt"></i> ลบ
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper mt-3 pagination-icon ">
                    {{ $user->links('pagination::simple-bootstrap-4') }}
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