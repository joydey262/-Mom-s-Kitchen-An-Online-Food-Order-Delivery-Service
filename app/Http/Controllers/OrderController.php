<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\OrderNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function tracking()
    {
        return view('order.tracking');
    }

    public function find(Request $request)
    {
        $this->validate($request, [
            'order' => ['required'],
        ]);
        $order = Order::where('trans_id', $request->order)->first();
        if($order){
            return view('order.find', compact('order'));
        }
        abort(404);
    }

    public function address()
    {
        return view('cart.address');
    }

    public function payment()
    {
        return view('cart.payment');
    }

    public function orderConfirm()
    {
        return view('cart.order-confirm');
    }

    public function myOrder(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        return view('order.my-order', compact('orders'));
    }

    public function store(Request $request)
    {
        if(session()->get('cart')){
            if(session()->get('address')){
                if(session()->get('payment')){
                    $trans_id = rand(1111111111, 99999999999);
                    if(session()->get('payment') == 'AamarPay'){
                        $subtotal = 0;

                        foreach((array) session('cart') as $id => $details){
                            $subtotal += $details['price'];
                        }

                        $discountable = 0;
                        $discount = 0;

                        if(session()->get('coupon')){
                            $discount = session()->get('coupon')['per'];
                            $discountable += $subtotal / 100 * $discount;
                        }

                        $url = "https://sandbox.aamarpay.com/jsonpost.php";
                        $store_id = "aamarpaytest";
                        $signature_key = "dbb74894e82415a2f7ff0ec3a97e4183";
    
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS =>'{
                            "store_id": "'.$store_id.'",
                            "tran_id": "'.$trans_id.'",
                            "success_url": "'.route('order.success').'",
                            "fail_url": "'.route('order.fail').'",
                            "cancel_url": "'.route('order.cancel').'",
                            "amount": "'.$subtotal + $discountable.'",
                            "currency": "BDT",
                            "signature_key": "'.$signature_key.'",
                            "desc": "'.config('app.name').'",
                            "cus_name": "'.auth()->user()->name.'",
                            "cus_email": "'.auth()->user()->email.'",
                            "cus_add1": "Khulna",
                            "cus_add2": "Khulna",
                            "cus_city": "Khulna",
                            "cus_state": "Khulna",
                            "cus_postcode": "7654",
                            "cus_country": "Bangladesh",
                            "cus_phone": "'.auth()->user()->phone.'",
                            "type": "json"
                        }',
                        CURLOPT_HTTPHEADER => array(
                            'Content-Type: application/json'
                        ),
                        ));
                        
                        $response = curl_exec($curl);

                        curl_close($curl);
                        
                        $responseObj = json_decode($response);
    
                        if(isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {
                            return redirect($responseObj->payment_url);
                        }
                    }else{
                        $this->create($trans_id, 'Unpaid');
                    }
                    
                    return redirect()->route('cart.order.confirm');
                }else{
                    return redirect()->route('cart.payment');
                }
            }else{
                return redirect()->route('cart.address');
            }
        }else{
            return redirect()->route('welcome');
        }
    }

    public function create($trans_id, $payment)
    {
        if(session()->get('cart')){
            if(session()->get('address')){
                if(session()->get('payment')){
                    $subtotal = 0;

                    foreach((array) session('cart') as $id => $details){
                        $subtotal += $details['price'];
                    }

                    $discountable = 0;
                    $discount = 0;

                    if(session()->get('coupon')){
                        $coupon = session()->get('coupon')['code'];

                        $discount = session()->get('coupon')['per'];

                        $discountable += $subtotal / 100 * $discount;
                    }else{
                        $coupon = null;
                    }

                    $delivery_charge = 0;
                    $setting = Setting::first();
                    if($setting && $setting->delivery_charge){
                        $delivery_charge = $setting->delivery_charge;
                    }

                    $order = Order::create(['user_id' => auth()->user()->id, 'address_id' => session()->get('address')['id'], 'trans_id' => $trans_id, 'coupon' => $coupon, 'payment_method' => session()->get('payment'), 'sub_total' => $subtotal, 'delivery_charge' => $delivery_charge, 'discount' => $discount, 'discountable' => $discountable, 'payable' => $subtotal + $delivery_charge - $discountable, 'payment' => $payment, 'status' => 'Ordered', 'reservation' => session()->get('reservation')]);

                    foreach((array) session('cart') as $id => $details){
                        $order->products()->create(['user_id' => auth()->user()->id, 'order_id' => $order->id, 'item_id' => $id, 'category_id' => $details['category_id'], 'name' => $details['name'], 'price' => $details['price'], 'quantity' => $details['quantity'],]);
                    }

                    session()->forget(['cart', 'coupon', 'reservation', 'is_package']);

                    $users = User::whereIn('type', ['Delivery Boy', 'Admin'])->get();
                    Notification::send($users, new OrderNotify(auth()->user()->name, 'Placed a food order', $order->trans_id));
                    
                    return redirect()->route('cart.order.confirm');
                }else{
                    return redirect()->route('cart.payment');
                }
            }else{
                return redirect()->route('cart.address');
            }
        }else{
            return redirect()->route('welcome');
        }
    }

    public function success(Request $request)
    {
        $this->create($request->mer_txnid, 'Paid');
        return redirect()->route('cart.order.confirm');
    }

    public function fail(Request $request)
    {
        return redirect()->route('cart.payment');
    }

    public function cancel(Request $request)
    {
        return redirect()->route('cart.payment');
    }

    public function delete(Request $request)
    {
        $order = Order::find($request->id);
        if($order){
            $order->delete();

            $users = User::whereIn('type', ['Delivery Boy', 'Admin'])->get();
            Notification::send($users, new OrderNotify(auth()->user()->name, 'Cancel a food order', $order->trans_id));
        }

        return redirect()->back();
    }
}
