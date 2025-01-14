<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateQRCode()
    {
        // Tạo nội dung cho mã QR
        $data = 'https://example.com';

        // Tạo mã QR
        $qrCode = QrCode::size(300)->generate($data);

        // Trả mã QR ra view
        return view('frontend.pages.product_detail.maqr', compact('qrCode'));
    }
}

