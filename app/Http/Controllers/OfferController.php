<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $new_coupons = Coupon::whereDate('end', '>=', now())->get();
        $expired_coupons = Coupon::whereDate('end', '<', now())->get();
        return view('offers', compact('new_coupons', 'expired_coupons'));
    }
}
