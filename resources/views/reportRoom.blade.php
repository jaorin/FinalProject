@extends('layout.main')

@section('content')
<style>
#fbody {
    font-size: 14px;
}

@media print {
    #hid {
        display: none;
        /* ซ่อน  */
    }
    body * {
        visibility: hidden;
    }


}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">ข้อมูลห้องพัก</h4>
                </div>
                <div class="card-body">
                <div class=" justify-content-between align-items-center mb-3">

                    <form action="reportRoom" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="input-group">
                         
                            <div>
                                <label for="RoomStatus">เลือกสถานะ:</label>
                                <select id="RoomStatus" name="RoomStatus">
                                    <option value="ว่าง">ว่าง</option>
                                    <option value="มีผู้เช่า">มีผู้เช่า</option>
                                </select>
                            </div>

                            <div class="col-md-1 text-center">

                                    <button type="submit" id="print" class="btn btn-success " name="search"><i
                                            class="fa fa-print"></i> พิมพ์
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                        <thead>
                            <tr>
                                <th class="text-center">เลขห้อง</th>
                                <th class="text-center">ชั้น</th>
                                <th class="text-center">มิเตอร์น้ำล่าสุด</th>
                                <th class="text-center">มิเตอร์ไฟล่าสุด</th>
                                <th class="text-center">สถานะ</th>
                                <th class="text-center">สถานะการชำระ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $item)
                            <tr>
                                <td class="text-center">{{ $item->NumberRoom }}</td>
                                <td class="text-center">{{ $item->Floor }}</td>
                                <td class="text-center">{{ $item->New_Water }}</td>
                                <td class="text-center">{{ $item->New_Electricity }}</td>
                                <td class="text-center">{{ $item->RoomStatus }}</td>
                                <td class="text-center">{{ $item->PayStatus }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    <div class="pagination-wrapper mt-3 pagination-icon ">
                    {{ $rooms->links('pagination::simple-bootstrap-4') }}
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