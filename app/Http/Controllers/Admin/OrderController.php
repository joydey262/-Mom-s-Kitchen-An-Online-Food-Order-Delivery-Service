<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    public function update(Request $request){
        $order = Order::with('user')->find($request->id);

        if($order){
            $status = $order->status;
            $umsg = '';
            $amsg = '';
            if($order->status != 'Delivered'){
                $order->deliver_id = $request->user()->id;
                $order->payment = 'Paid';

                if($status == 'Ordered'){
                    $order->status = 'Confirm';
                    $amsg = 'Confirm a food order';
                    $umsg = 'Confirm your food order';
                }

                if($status == 'Confirm'){
                    $order->status = 'Processed';
                    $amsg = 'Processed a food order';
                    $umsg = 'Processed your food order';
                }

                if($status == 'Processed'){
                    $order->status = 'Delivered';
                    $amsg = 'Delivered a food order';
                    $umsg = 'Delivered your food order';
                }

                $order->save();

                $admins = User::where('type', 'Admin')->get();

                Notification::send($admins, new OrderNotify(auth()->user()->name, $amsg, $order->trans_id));

                $order->user->notify(new OrderNotify(auth()->user()->name, $umsg, $order->trans_id));
            }
        }
        
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $order = Order::find($request->id);
        if($order){
            $order->delete();

            $admins = User::where('type', 'Admin')->get();
            Notification::send($admins, new OrderNotify(auth()->user()->name, 'Cancel a food order', $order->trans_id));

            $order->user->notify(new OrderNotify(auth()->user()->name, 'Cancel your food order', $order->trans_id));
        }

        return redirect()->back();
    }
}
