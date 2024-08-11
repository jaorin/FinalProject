<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Lease;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MyInvoiceController extends Controller
{

 
    public function myInvoice()
    {
        $user = Auth::user();
        $rooms = Room::all();
        
        $invoice = Invoice::join('leases', 'invoices.LeaseID', '=', 'leases.id')
            ->join('users', 'leases.Usersid', '=', 'users.id')
            ->where('users.id', $user->id)
            ->orderByDesc('invoices.id')
            ->select('invoices.*')
            ->first();
        
        if ($invoice) {
            $netPay = $invoice->Net_Pay;
    
            return view('invoices.show', [
                'invoice' => $invoice,
                'rooms' => $rooms,
                'netPay' => $netPay,
            ]);
        } else {
            
            return view('invoices.show', [
                'invoice' => null, 
                'rooms' => $rooms,
                'netPay' => 0, 
            ]);
        }
    }

    public function myInvoiceIndex()
{
    $user = Auth::user();
    $rooms = Room::all();
    
    // Retrieve the latest invoice for the current user
    $invoice = Invoice::join('leases', 'invoices.LeaseID', '=', 'leases.id')
        ->join('users', 'leases.Usersid', '=', 'users.id')
        ->where('users.id', $user->id)
        ->orderByDesc('invoices.id')
        ->select('invoices.*')
        ->paginate(10); // ระบุจำนวนรายการที่ต้องการแสดงต่อหน้า

    if ($invoice->isEmpty()) {
        return view('invoices.index')->with('message', 'ไม่พบใบแจ้งหนี้สำหรับผู้ใช้ที่เข้าสู่ระบบ');
    } else {
        return view('invoices.index', [
            'invoices' => $invoice,
        ]);
    }
}

    
    
    
    
}