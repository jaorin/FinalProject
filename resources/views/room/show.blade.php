@extends('layout.main')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">ข้อมูลห้องพัก</h4>
                </div>
                <div class="card-body">

                    <a href="{{ url('/room') }}" title="Back" class="btn btn-warning mb-3"><i
                            class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</a>

                    <a href="{{ url('/room/' . $room->id . '/edit') }}" title="Edit Room" class="btn btn-primary mb-3"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 200px;">เลขห้อง</th>
                                    <td>{{ $room->NumberRoom }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">ชั้น</th>
                                    <td>{{ $room->Floor }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">มิเตอร์น้ำล่าสุด</th>
                                    <td>{{ $room->New_Water }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">มิเตอร์ไฟล่าสุด</th>
                                    <td>{{ $room->New_Electricity }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">ค่าเช่าห้องพัก</th>
                                    <td>{{ $room->Room_Price }}</td>
                                </tr>
                       
                                <tr>
                                    <th class="bg-light">ค่าจองห้องพัก</th>
                                    <td>{{ $room->Booking_Price }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">ค่ามัดจำห้องพัก</th>
                                    <td>{{ $room->Deposit_Price }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">สถานะ</th>
                                    <td>{{ $room->RoomStatus }}</td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* เพิ่มสไตล์ CSS ที่นี่ */
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
@endsection
