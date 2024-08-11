@extends('layout.main')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">อัพโหลด ห้องพัก{{ $upload->NumberRoom }}</h4>
                </div>
                <div class="card-body">
                    @if( Auth::user()->role_id == '1')
                    <a href="{{ url('/upload') }}" title="Back" class="btn btn-warning mb-3"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i> กลับ</a>
                    <a href="{{ url('/room/' . $upload->leases->room->id . '/edit') }}" title="Edit" class="btn btn-info mb-3"><i class="fas fa-dollar-sign"
                            aria-hidden="true"></i> ชำระเงินแล้ว</a>
                    @endif
                
                    @if( Auth::user()->role_id != '1')
                    <a href="{{ url('/userUploads') }}" title="Back" class="btn btn-warning mb-3"><i
                            class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</a>
                    @endif
                    <br />

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>

                                <tr>
                                    <th class="bg-light" style="width: 200px;">หมายเลขห้องพัก</th>
                                    <td>{{ $upload->NumberRoom }}</td>
                                </tr>

                                <tr>
                                    <th class="bg-light">ชื่อผู้เช่า</th>
                                    <td>{{ $upload->user->name }}</td>
                                </tr>

                                <tr>
                                    <th class="bg-light">วัน/เวลาที่โอน</th>
                                    <td>{{ thaidate('j F Y เวลา H:i น.', strtotime($upload->DateUpload)) }}</td>
                                </tr>

                                <tr>
                                    <th class="bg-light">สลิปการโอน</th>
                                    <td><img src="{{ asset('storage/' . $upload->Photo) }}" width="500" /></td>
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
/* Add CSS styles here */
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

/* You can adjust other styles according to your preferences */
</style>
@endsection