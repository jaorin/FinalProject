@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">

        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ข้อมูลประเภทห้องพัก</div>
                    <div class="card-body">

                        <a href="{{ url('/type-room') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</button></a>
                        <a href="{{ url('/type-room/' . $typeroom->id . '/edit') }}" title="Edit TypeRoom"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                        <!-- <form method="POST" action="{{ url('typeroom' . '/' . $typeroom->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete TypeRoom" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ลำดับ</th><td>{{ $typeroom->id }}</td>
                                    </tr>
                                    <tr><th> ประเภทห้องพัก </th><td> {{ $typeroom->TypeRoomID }} </td></tr><tr><th> ราคา </th><td> {{ $typeroom->Price }} </td></tr><tr><th> ค่าจอง </th><td> {{ $typeroom->Booking }} </td></tr><tr><th> ค่ามัดจำ </th><td> {{ $typeroom->DepositBooking }} </td></tr><tr><th> ค่าน้ำ / ต่อหน่วย </th><td> {{ $typeroom->Water }} </td></tr><tr><th> ค่าไฟ / ต่อหน่วย </th><td> {{ $typeroom->Electricity }} </td></tr><tr><th> ค่าประกัน </th><td> {{ $typeroom->Deposit }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
