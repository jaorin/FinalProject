@extends('layout.main')

@section('content')
<div class="row" >
    <div class="col-md-12" id="printableArea">
        <div class="card card-body">
            <h3 class="text-center"><b>สัญญาเช่า</b></h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <address>
                            <h4 class="text-center">
                                &nbsp;<b class="text-danger">หอพักอยู่เจริญ</b>
                            </h4>
                        </address>
                    </div>
                    <div class="pull-right text-end mt-3">
                        <address>
                            <h5>วันที่ทำสัญญา
                                <u>&nbsp;&nbsp;{{ thaidate('วันที่ j เดือน F ปี พ.ศ. Y', strtotime($lease->DateLease)) }}&nbsp;&nbsp;</u>
                            </h5>
                        </address>
                    </div>

                    <div class="col-md-12 mt-3 font-14">
                        <address>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สัญญาเช่าห้องพักฉบับนี้ทำขึ้นระหว่าง
                                <b> <u>&nbsp;&nbsp;นรินทร์ ประกอบกิจ&nbsp;&nbsp;</u></b>
                                ซึ่งต่อไปนี้ในสัญญานี้เรียกว่า <b>"ผู้ให้เช่า"</b> ฝ่ายหนึ่งกับ
                                <b><u>&nbsp;&nbsp;{{ $lease->user->name }}&nbsp;&nbsp;</u></b>
                                อายุ <b><u>&nbsp;&nbsp;{{ $lease->user->age }}&nbsp;&nbsp;</u></b> ปี เบอร์โทรศัพท์
                                <b><u>&nbsp;&nbsp;{{ $lease->user->phone }}&nbsp;&nbsp;</u></b>
                                ซึ่งต่อไปนี้ในสัญญานี้เรียกว่า <b>"ผู้เช่า"</b> อีกฝ่ายหนึ่ง
                                ทั้งสองฝ่ายได้ตกลงทำสัญญากัน โดยมีข้อความดังต่อไปนี้
                            </p>
                        </address>
                    </div>
                    <div class="col-md-12 font-14">
                        <address>
                            <p>
                                <b>1.</b>ผู้ให้เช่าตกลงให้เช่าและผู้เช่าตกลงเช่าห้องพักหมายเลขห้องพักคือ
                                <b><u>&nbsp;&nbsp;{{ $lease->room->NumberRoom }}&nbsp;&nbsp;</u></b> ชั้นที่
                                <b><u>&nbsp;&nbsp;{{ $lease->room->Floor }}&nbsp;&nbsp;</u></b> ของ
                                หอพักอยู่เจริญ เลขที่ 348 หมู่ 2
                                ต.สามเรือน อ.บางปะอิน จ.พระนครศรีอยุธยา รหัสไปรษณีย์ 13160
                                เพื่อใช้เป็นที่พักอาศัยในอัตราค่าเช่าเดือนล่ะ
                                <b><u>&nbsp;&nbsp;{{ number_format($lease->room->Room_Price) }}&nbsp;&nbsp;</u></b> บาท
                                ค่าเช่าดังกล่าวข้างต้นนี้
                                ไม่รวมถึง ค่าไฟ ค่าน้ำประปา และค่าบริการอื่นๆ ซึ่งผู้เช่าต้องชำระแก่ผู้ให้เช่า
                            </p>
                        </address>
                    </div>
                    <div class="col-md-12 font-14 ">
                        <address>
                            <p>
                                <b>2.</b>ผู้เช่าตกลงเช่าห้องพักอาศัยตามสัญญาข้อ 1. มีกำหนดเวลา <b>1</b> ปี
                                นับตั้งแต่วันที่
                                <u>&nbsp;&nbsp;{{ thaidate('j F Y', strtotime($lease->DateLease)) }}&nbsp;&nbsp;</u>
                            </p>
                        </address>
                    </div>
                    <div class="col-md-12 font-14">
                        <address>
                            <p>
                                <b>3.</b>การชำระค่าห้องพัก ผู้เช่าตกลงจะชำระค่าเช่าแก่ผู้ให้เช่าเป็นการล่วงหน้า
                                โดยชำระภายในวันที่ 5 ของทุกเดือนตลอดเวลาอายุการเช่า
                            </p>
                        </address>
                    </div>
                    <div class="col-md-12 font-14">
                        <address>
                            <p>
                                <b>4.</b>ในวันที่ทำสัญญานี้ ผู้เช่าจะต้องชำระเงินแก่ผู้ให้เช่า ดังนี้ <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1 ผู้เช่าจะต้องชำระเงินค่าเช่าห้องพักล่วงหน้า
                                สำหรับเดือนแรกที่เข้าพักเป็นจำนวน
                                <b><u>&nbsp;&nbsp;{{ number_format($lease->LeaseTotal) }}&nbsp;&nbsp;</u></b> บาท
                                ตามสัญญานี้แต่หากผู้เช่ายังค้างชำระค่าเช่าหรือก่อความเสียใดๆ
                                ผู้เช่ายินยอมให้ผู้ให้เช่านำค่าเช่าที่ค้างชำระหรือค่าเสียหายมาหักจากเงินประกัยดังกล่าวได้
                                และหากเงินไม่พอชำระค่าเสียหาย ผู้เช่าจะชดใช้เงินค่าเสียหายแก่ผู้ให้เช่าจนครบจำนวน
                            </p>
                        </address>
                    </div>
                    <div class="col-md-12 font-14 ">
                        <address>
                            <p>
                                <b>5.</b>หากผู้เช่าต้องการจะย้ายออก ต้องแจ้งให้ผู้ให้เช่าทราบล่วงหน้าอย่างน้อย 1
                                เดือน
                                สำหรับเงินประกันนั้นจะได้คืนหลังจากผู้เช่าย้ายออกไปภายใน 5 วัน
                                โดยผู้เช่าจะทำการโอนเงินผ่านบัญชีธนาคาร ซึ่งต้องเป็นบัญชีของผู้เช่าเท่านั้น
                            </p>
                        </address>
                    </div>
                    <div class="col-md-12 font-14 ">
                        <address>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สัญญานี้ทำเป็นสองฉบับ
                                มีข้อความตรงกัน คู่สัญญาต่างยึดถือไว้ฝ่ายละฉบับ <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้เช่าและผู้ให้เช่าได้อ่านแล้วเข้าใจข้อความในสัญญานี้โดยตลอดแล้ว
                                เห็นถูกต้องตรงตามเจตนา จึงได้ลงลายมือชื่อไว้เป็นหลักฐานต่อหน้าพยาน
                            </p>
                        </address>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <p>ลงชื่อ<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>ผู้ให้เช่า<br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;( นรินทร์ ประกอบกิจ )
                                </p>
                                <p>ลงชื่อ<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>พยาน<br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                                </p>
                            </div>
                            <div class="col-md-6 text-md-end  ">
                                <p>ลงชื่อ<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>ผู้เช่า<br>
                                <p class="col-md-9">( {{ $lease->user->name }} )</p>
                                </p>
                                <p>ลงชื่อ<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>พยาน<br>
                                <p class="col-md-9 ">(
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
                    <div class="text-end">
                        <button class="btn btn-success text-white" type="button" onclick="printReport()">
                            พิมพ์ใบสัญญาเช่า
                        </button>
                    </div>
                </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(document).ready(function() {
    jQuery("tbody tr:even").css("background-color", "#f2f2f2");
});

function printReport() {
    var printContents = document.getElementById('printableArea').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

// เพิ่มฟังก์ชันนี้เพื่อรีเฟรชหน้าหลังจากการพิมพ์ PDF เสร็จสิ้น
window.onafterprint = function () {
    location.reload();
};


</script>



<style>
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
<style>
@media print {
    body * {
        visibility: hidden;
    }

    #printableArea,
    #printableArea * {
        visibility: visible;
    }

    #printableArea {
        position: static;
        width: 100%;
    }

    @page {
        size: auto;
        margin: 0;
    }
}
</style>
@endsection