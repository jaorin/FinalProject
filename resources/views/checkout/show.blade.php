@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">แจ้งย้ายออก  ห้องที่ {{ $checkout->leases->room->NumberRoom }}</div>
                <div class="card-body">

                    <a href="{{ url('/checkout') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</button></a>
                    <a href="{{ url('/checkout/' . $checkout->id . '/edit') }}" title="Edit Checkout"><button
                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            แก้ไข</button></a>

                    <form method="POST" action="{{ url('checkout' . '/' . $checkout->id) }}" accept-charset="UTF-8"
                        style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Checkout"
                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                aria-hidden="true"></i> ลบ</button>
                    </form>
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ชื่อผู้เช่า</th>
                                    <td>{{ $checkout->user->name }}</td>
                                </tr>
                                <tr>
                                    <th> วันที่แจ้งย้าย </th>
                                    <td> {{ thaidate('j F Y', strtotime($checkout->Datetoday)) }} </td>
                                </tr>
                                <tr>
                                    <th> วันที่ย้ายออก </th>
                                    <td> {{ thaidate('j F Y', strtotime($checkout->DateCheckout)) }} </td>
                                </tr>
                                <tr>
                                    <th> เลขที่สัญญา </th>
                                    <td> {{ $checkout->LeaseID }} </td>
                                </tr>
                                <tr>
                                    <th> รหัสผู้เช่า </th>
                                    <td> {{ $checkout->Usersid }} </td>
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
$(document).ready(function() {
    $("tbody tr:even").css("background-color", "#f2f2f2");
});

function printReport() {
    var printContents = document.getElementById('printableArea').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
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