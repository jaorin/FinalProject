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

    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
    }

    body {
        font-family: "THSarabunNew";
        font-size: 15pt;
    }

    @page {
        size: landscape;
        margin: 20mm 10mm;
    }

    .table {
    white-space: nowrap;
    transform: rotate(0deg) !important;
    border: 1px solid;
    margin: auto;
}

    tbody td {
        text-align: center; /* จัดตรงกลางแนวนอน */
        vertical-align: middle; /* จัดตรงกลางแนวตั้ง */
        font-size: 13pt;
        border-bottom: 1px solid #ddd;
        padding: 15px;
    }
    </style>
</head>

<body>


    <center>
        
        <h2 class="mb-0">รายงานรายได้ประจำเดือน</h2>
        <h4 style="margin-top: -25px;">ตั้งแต่วันที่ : <?php echo thaidate("j F Y", strtotime($from)); ?>
            &nbsp;&nbsp;&nbsp; ถึงวันที่ : <?php echo thaidate("j F Y", strtotime($to)); ?></h4>
    </center>

    <div class="table-responsive">
        <table class="table" >
            <thead>
                <tr>
                    <th>เลขห้องพัก</th>
                    <th>วันแจ้งชำระเงิน</th>
                    <th>มิตเตอร์น้ำเก่า</th>
                    <th>มิตเตอร์น้ำใหม่</th>
                    <th>จำนวนหน่วย</th>
                    <th>รวมค่าน้ำ</th>
                    <th>มิตเตอร์ไฟเก่า</th>
                    <th>มิตเตอร์ไฟใหม่</th>
                    <th>จำนวนหน่วย</th>
                    <th>รวมค่าไฟ</th>
                    <th>ค่าเช่าห้อง</th>
                    <th>ยอดจ่ายสุทธิ</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalNetPay = 0; ?>
                @foreach($report1 as $item)
                <?php $totalNetPay += $item->Net_Pay; ?>
                <tr>
                    <td>{{ $item->NumberRoom }}</td>
                    <td>{{ thaidate('j F Y', strtotime($item->DateInvoices)) }}</td>
                    <td>{{ $item->Water_Old }}</td>
                    <td>{{ $item->Water_New }}</td>
                    <td>{{ $item->Water_Unit }}</td>
                    <td>{{ number_format($item->Water_Total, 2) }}</td>
                    <td>{{ $item->Electricity_Old }}</td>
                    <td>{{ $item->Electricity_New }}</td>
                    <td>{{ $item->Electricity_Unit }}</td>
                    <td>{{ number_format($item->Electricity_Total, 2) }}</td>
                    <td>{{ number_format($item->Room_Price, 2) }}</td>
                    <td>{{ number_format($item->Net_Pay, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h3>สรุปรายรับประจำเดือน <?php echo thaidate("F", strtotime($from)); ?>
            : {{ number_format($totalNetPay, 2) }} บาท</h3>
    </div>
</body>

</html>