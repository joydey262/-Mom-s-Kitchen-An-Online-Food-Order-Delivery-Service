<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Coupon;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function empty()
    {
        return view('cart.empty');
    }

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function address()
    {
        return view('cart.address');
    }

    public function payment()
    {
        return view('cart.payment');
    }

    public function orderConfirm(Request $request)
    {
        $order = Order::where('user_id', $request->user()->id)->orderBy('id', 'desc')->first();
        return view('cart.order-confirm', compact('order'));
    }

    public function addToCart($id)
    {
        $item = Item::with('category')->findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            if($item->quantity < $item->stock || $item->quantity == $item->stock){
                $cart[$id]['price'] = ($cart[$id]['price'] / $cart[$id]['quantity']) * ($cart[$id]['quantity'] + 1);
                $cart[$id]['quantity']++;
            }
        } else {
            $cart[$id] = [
                "name" => $item->name,
                "quantity" => $item->quantity,
                "price" => ($item->price) - ($item->price / 100 * $item->discount),
                "img" => $item->img,
                "category" => $item->category->name,
                "category_id" => $item->category->id
            ];

        }          
        session()->put('cart', $cart);
        if($item->is_package == 1){
            session()->put('is_package', true);
        }
        return redirect()->back();
    }

    public function updateToCart(Request $request)
    {
        if($request->id && $request->type){
            $item = Item::findOrFail($request->id);

            $cart = session()->get('cart');

            if($cart){
                if($item->quantity < $item->stock || $item->quantity == $item->stock){
                    if($request->type == 'plus'){
                        $cart[$request->id]['price'] = ($cart[$request->id]['price'] / $cart[$request->id]['quantity']) * ($cart[$request->id]['quantity'] + 1);
                        $cart[$request->id]['quantity']++;
                    }

                    if($request->type == 'minus' && $cart[$request->id]['quantity'] > 1){
                        $cart[$request->id]['price'] = ($cart[$request->id]['price'] / $cart[$request->id]['quantity']) * ($cart[$request->id]['quantity'] - 1);
                        $cart[$request->id]['quantity']--;
                    }

                }

                session()->put('cart', $cart);
            }
        }

        return redirect()->back();

    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function deliveryHere($id)
    {
        $address = Address::findOrFail($id);
        if($address){
            session()->put('address', $address);
        }
        return redirect()->route('cart.payment');
    }

    public function promo(Request $request)
    {
        $coupon = Coupon::where('code', $request->promo)->first();
        if($coupon){
            session()->put('coupon', $coupon);
        }

        return redirect()->back();
    }

    public function method(Request $request)
    {
        session()->put('payment', $request->payment);
        return redirect()->route('cart.payment');
    }

    public function reservation(Request $request)
    {
        session()->put('reservation', $request->reservation);
        return redirect()->back();
    }
}
