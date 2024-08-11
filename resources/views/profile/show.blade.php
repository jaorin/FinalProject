@extends('layout.main')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">ข้อมูลผู้ใช้งาน</h4>
                </div>
                <div class="card-body">

                    <a href="{{ url('/home') }}" title="Back" class="btn btn-warning mb-3"><i
                            class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</a>
                            <!-- <a href="{{ url('/profile/' . $user->id . '/edit') }}" title="Edit Profile"
                        class="btn btn-primary mb-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        แก้ไขข้อมูล</a> -->

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 200px;">ลำดับ</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="bg-light">ชื่อ</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">อีเมล</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">สถานะ</th>
                                    <td>{{ $user->role->role_name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">อายุ</th>
                                    <td>{{ $user->age }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">เพศ</th>
                                    <td>{{ $user->gender }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">เบอร์โทร</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // ตั้งสีพื้นหลังของแถวที่คูณ
        $("tbody tr:even").css("background-color", "#f2f2f2");
    });
</script>

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

    /* ปรับแต่งสไตล์อื่น ๆ ตามความต้องการของคุณ */
</style>
@endsection
