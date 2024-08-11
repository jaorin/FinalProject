<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
    }

    /* โค้ด CSS สำหรับจัดตรงกลางแนวนอนและแนวตั้ง */
    .text-center {
        text-align: center;
        vertical-align: middle;
    }

    /* คลาส .table ของคุณ */
    .table {

        white-space: nowrap;
        transform: rotate(0deg) !important;
        border: 1px solid;
        margin: auto;
    }

    /* CSS สำหรับ tbody td */
    tbody td {
        font-size: 16pt;
        border-bottom: 1px solid #ddd;
        padding: 15px;
    }

    body {
        font-family: "THSarabunNew";
        font-size: 18pt;
    }

    /* CSS สำหรับเฮดเดอร์ */
    .header {
        text-align: center;
    }
    </style>



</head>

<body>
    <center>
        <h2 class="mb-0">รายงานสถานะห้องพัก</h2>

    </center>


    <div class="table-responsive ">
        <table class="table">
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
                @foreach($reportRoom as $item)
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
</body>

</html>