<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Momo\MomoPayment;

class MomoController extends Controller
{
    // public function checkOut()
    // {
    //     $cart = session()->get('cart', []);
    //     $total = 0;

    //     foreach ($cart as $item) {
    //         $total += $item['gia'] * $item['soluong'];
    //     }

    //     // Tạo yêu cầu thanh toán Momo
    //     $payment = new MomoPayment();
    //     $payment->setPartnerCode(config('MOMO_PARTNER_CODE'));
    //     $payment->setAccessKey(config('MOMO_ACCESS_KEY'));
    //     $payment->setSecretKey(config('MOMO_SECRET_KEY'));
    //     $payment->setReturnUrl(route('momo.return'));
    //     $payment->setAmount($total);

    //     // Thực hiện thanh toán
    //     $redirectUrl = $payment->createPayment();

    //     // Chuyển hướng đến trang thanh toán Momo
    //     return redirect($redirectUrl);
    // }
}
