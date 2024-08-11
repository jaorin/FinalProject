@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">

        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ข้อมูลประเภทห้องพัก</div>
                    <div class="card-body">
                        <a href="{{ url('/type-room/create') }}" class="btn btn-success btn-sm" title="Add New TypeRoom">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                        </a>

                        <form method="GET" action="{{ url('/type-room') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th><th>ประเภทห้องพัก</th><th>ราคา</th><th>สถานะการจอง</th><th>ค่ามัดจำ</th><th>ค่าน้ำ / ต่อหน่วย</th><th>ค่าไฟ / ต่อหน่วย</th><th>ค่าประกัน</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($typeroom as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->TypeRoomID }}</td><td>{{ $item->Price }}</td><td>{{ $item->Booking }}</td><td>{{ $item->DepositBooking }}</td><td>{{ $item->Water }}</td><td>{{ $item->Electricity }}</td><td>{{ $item->Deposit }}</td>
                                        <td>
                                            <a href="{{ url('/type-room/' . $item->id) }}" title="View TypeRoom"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> ดูข้อมูล</button></a>
                                            <a href="{{ url('/type-room/' . $item->id . '/edit') }}" title="Edit TypeRoom"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/type-room' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete TypeRoom" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $typeroom->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
