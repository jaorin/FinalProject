@extends('layout.main')

@section('content')
@if( Auth::user()->role_id == '1')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">ข้อมูลแจ้งย้ายออก</div>
                <div class="card-body">
                    @if( Auth::user()->role_id != '1')
                    <div class="d-flex justify-content-between align-items-center mb-3 ">
                        <a href="{{ url('/checkout/create') }}" class="btn btn-success btn-sm" title="Add New Checkout">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                        </a>
                        @endif
                        <form method="GET" action="{{ url('/checkout') }}" accept-charset="UTF-8" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ค้นหา..."
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fas fa-search"></i> ค้นหา
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">หมายเลขห้องพัก</th>
                                    <th class="text-center">ชื่อผู้เช่า</th>
                                    <th class="text-center">วันที่แจ้งย้ายออก</th>
                                    <th class="text-center">วันที่ย้ายออก</th>
                                    <th class="text-center">เลขที่สัญญา</th>
                                    <th class="text-center">รหัสผู้เช่า</th>
                                    <th class="text-center">การดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkout as $item)
                                <tr>
                                    <td class="text-center">{{ $item->leases->room->NumberRoom }}</td>
                                    <td class="text-center">{{ $item->user->name}}</td>
                                    <td class="text-center">{{ thaidate('j F Y', strtotime($item->Datetoday)) }}</td>
                                    <td class="text-center">{{ thaidate('j F Y', strtotime($item->DateCheckout)) }}</td>
                                    <td class="text-center">{{ $item->LeaseID }}</td>
                                    <td class="text-center">{{ $item->Usersid }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/checkout/' . $item->id) }}" title="View Checkout"><button
                                                class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                                ดูข้อมูล</button></a>
                                        <a href="{{ url('/checkout/' . $item->id . '/edit') }}"
                                            title="Edit Checkout"><button class="btn btn-primary btn-sm"><i
                                                    class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                แก้ไข</button></a>

                                        <form method="POST" action="{{ url('/checkout' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Checkout"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa fa-trash-alt" aria-hidden="true"></i> ลบ</button>
                                        </form>

                                        <a href="{{ url('/room/' . $item->leases->room->id . '/edit') }}"
                                            title="Edit Checkout"><button class="btn btn-warning btn-sm">
                                            <i class="fa fa-sign-out-alt" aria-hidden="true"></i> ย้ายออกแล้ว
                                        </button></a>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper mt-3 pagination-icon ">
                            {{ $checkout->links('pagination::simple-bootstrap-4') }}
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
    @endif
    @if( Auth::user()->role_id != '1')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->

            <!-- Admin -->

            @if( Auth::user()->role_id == '1')
            <div class="col-md-6 col-lg-3">
                <a class="" href="/room" aria-expanded="false">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-view-dashboard"></i>
                            </h1>
                            <h6 class="text-white">ข้อมูลห้องพัก</h6>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <a class="" href="/lease" aria-expanded="false">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-collage"></i>
                            </h1>
                            <h6 class="text-white">ข้อมูลสัญญาเช่า</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <a class="" href="/profile" aria-expanded="false">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-account"></i>
                            </h1>
                            <h6 class="text-white">ข้อมูลผู้เช่า</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-message-reply-text"></i>
                        </h1>
                        <h6 class="text-white">รายงาน</h6>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Admin -->

        <!-- Guest -->

        @if( Auth::user()->role_id != '1')
        <div class="col-md-6 col-lg-3">
            <a class="" href="/#" aria-expanded="false">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-barcode-scan"></i>
                        </h1>
                        <h6 class="text-white">ชำระเงิน</h6>
                    </div>
                </div>
            </a>
        </div>

        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <a class="" href="/myInvoice/" aria-expanded="false">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-chart-pie"></i>
                        </h1>
                        <h6 class="text-white">แสดงค่าเช่า</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <a class="" href="/myprofile/" aria-expanded="false">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-account"></i>
                        </h1>
                        <h6 class="text-white">ข้อมูลผู้เช่า</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <a class="" href="/resetpassword/{{ Auth::user()->id }}/edit" aria-expanded="false">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-key-variant"></i>
                        </h1>
                        <h6 class="text-white">เปลี่ยนรหัสผ่าน</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    <!-- Guest -->

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-md-6">



                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">หลักการและเหตุผล / วัตถุประสงค์ </h4>
                        <div class="todo-widget scrollable" style="height: 450px">
                            <style>
                            .text-align-justify {
                                text-align: justify;
                            }
                            </style>
                            <p class="text-align-justify">
                                &nbsp;&nbsp;ปัจจัย 4 ประกอบด้วย ยารักษาโรค เครื่องนุ่งห่ม อาหาร และที่อยู่อาศัย
                                ซึ่งเป็นสิ่งจำเป็นในการดำเนินชีวิตของมนุษย์ มนุษย์มีความจำเป็นต้องกินอาหาร ใส่เสื้อผ้า
                                เมื่อป่วยก็ต้องกินยาเพื่อรักษา และต้องมีที่สำหรับพักผ่อนอยู่อาศัยซึ่งอาจจะเป็นบ้าน คอนโด
                                หอพัก ทั้งนี้ก็ขึ้นอยู่กับบุคคลว่าจะเลือกที่อยู่อาศัยแบบไหน
                                สำหรับหอพักนั้นเป็นที่อยู่อาศัยประเภทหนึ่งที่ได้รับความนิยมสำหรับบุคคลทั่วไปที่ต้องการพักเพียงชั่วคราว
                                เพื่อไปทำงาน เรียน หรืออาจจะอยู่อาศัยแทนบ้านก็ได้
                                จึงทำให้ธุรกิจหอพักในปัจจุบันได้รับความนิยมเพิ่มมากขึ้น และมีการแข่งขันกันสูง
                                ซึ่งจะสังเกตได้ว่าสถานที่ใดมีโรงงานอุตสาหกรรม สถานศึกษา
                                จะมีหอพักถูกสร้างขึ้นบริเวณใกล้เคียงเป็นจำนวนมาก
                                เพื่อให้บริการแก่พนักงานและนักศึกษาที่ต้องการ โดยมีทั้งหอพักที่เป็นหอพักหญิงล้วน
                                ห้องแอร์
                                ห้องพัดลม มีบริการอินเตอร์เน็ต ซักรีด และบริการอื่นๆ อีกมากมายไว้บริการแก่ผู้ที่มาเช่า
                            </p>
                            <h6 class="mt-1 text-align-justify">
                                &nbsp;&nbsp;หอพักอยู่เจริญ ตั้งอยู่เลขที่ 348 หมู่ 2 ต.สามเรือน อ.บางปะอิน
                                จ.พระนครศรีอยุธยา
                                รหัสไปรษณีย์ 13160 มีเนื้อที่ 145 ตารางวา สร้างขึ้นเมื่อปี พ.ศ. 2548
                                มีลักษณะเป็นอาคารปูน
                                จำนวน 5 ชั้น มีห้องพักจำนวน 55 ห้อง เป็นสถานที่บริการหอพักรายเดือน
                                โดยมีทำเลที่ตั้งเป็นแหล่งโรงงานอุตสาหกรรม
                                และมีพนักงานโรงงานอุตสาหกรรมในย่านนั้นพักอาศัยเป็นส่วนใหญ่
                                ลักษณะการทำงานของหอพักจะมีการเปิดให้เช่าห้องพักโดยการเก็บข้อมูลผู้เช่า
                                รายละเอียดการเช่าหอพัก ซึ่งทางหอพักใช้วิธีการเก็บข้อมูลรายละเอียดต่างๆ
                                โดยการจดบันทึกลงในสมุด และคำนวณค่าเช่าห้องพัก ค่าน้ำ ค่าไฟ ทางโปรแกรมสำเร็จรูป Excel
                                ทำให้รายละเอียดและข้อมูลที่จัดเก็บยังไม่เป็นระบบระเบียบและเกิดความล่าช้าในการทำงาน เช่น
                                การตรวจสอบยอดค้างชำระ ค่าเช่า การตรวจสอบห้องว่าง และการตรวจสอบการจอง เป็นต้น
                            </h6>
                            <h4 class="mt-4"> วัตถุประสงค์ </h4>
                            <h4 class="mt-3">1 เพื่อวิเคราะห์และออกแบบระบบจัดการหอพักโดยใช้ Web Application</h7>
                                <h4 class="mt-2">2 เพื่อให้เกิดความสะดวกและรวดเร็วในการให้บริการแก่ผู้เช่า</h7>
                                    <h4 class="mt-2">3
                                        เพื่อให้สามารถตรวจสอบข้อผิดพลาดของการคำนวณค่าเช่ารวมทั้งค่าน้ำค่าไฟ
                                        </h7>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- card -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="col-lg-12">
                                <div class="card-body b-l calender-sidebar">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    @endif
    @endsection