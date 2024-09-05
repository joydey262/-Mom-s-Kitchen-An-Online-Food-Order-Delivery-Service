<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = [
            'orders' => Order::where('user_id', auth()->user()->id)->count(),
            'addresses' => Address::where('user_id', auth()->user()->id)->count(),
            'items' => Product::where('user_id', auth()->user()->id)->count(),
            'reviews' => Review::where('user_id', auth()->user()->id)->count(),
        ];

        return view('home', compact('home'));
    }
}
