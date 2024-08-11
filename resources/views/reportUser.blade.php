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
                    <h4 class="mb-0">ข้อมูลผู้เช่า</h4>
                </div>
                <div class="card-body">
                    <div class=" justify-content-between align-items-center mb-3">

                        <form action="reportUser" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <!-- ส่วนของอินพุต -->
                                <div class="col-md-1 text-center">
                                    <button type="submit" id="print" class="btn btn-success" name="search">
                                        <i class="fa fa-print"></i> พิมพ์
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
                                        <th class="text-center">ชื่อผู้เช่า</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">อายุ</th>
                                        <th class="text-center">เพศ</th>
                                        <th class="text-center">เบอร์โทรศัพท์</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <td class="text-center">{{ $item->name}}</td>
                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center">{{ $item->age }}</td>
                                    <td class="text-center">{{ $item->gender }}</td>
                                    <td class="text-center">{{ $item->phone }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper mt-3 pagination-icon ">
                        {{ $users->links('pagination::simple-bootstrap-4') }}
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