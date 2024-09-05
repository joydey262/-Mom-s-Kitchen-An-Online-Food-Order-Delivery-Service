<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons', compact('coupons'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'code' => ['required', 'string', 'max:255', 'unique:coupons'],
            'per' => ['required', 'numeric'],
            'start' => ['required'],
            'end' => ['required'],
        ]);

        Coupon::create(['user_id' => $request->user()->id, 'code' => $request->code, 'per' => $request->per, 'start' => $request->start, 'end' => $request->end]);
        
        return redirect()->back();
    }

    public function update(Request $request){
        $this->validate($request, [
            'code' => ['required', 'string', 'max:255', 'unique:coupons,code,'.$request->id],
            'per' => ['required', 'numeric'],
            'start' => ['required'],
            'end' => ['required'],
        ]);

        $coupon = Coupon::find($request->id);

        if($coupon){
            $coupon->code = $request->code;
            $coupon->per = $request->per;
            $coupon->start = $request->start;
            $coupon->end = $request->end;
            $coupon->save();
        }
        
        return redirect()->back();
    }

    public function delete(Request $request){
        $coupon = Coupon::find($request->id);

        if($coupon){
            $coupon->delete();
        }
        
        return redirect()->back();
    }
}
