<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = [
            'customers' => User::where('type', 'User')->count(),
            'delivery_boy' => User::where('type', 'Delivery Boy')->count(),
            'admins' => User::where('type', 'Admin')->count(),
            'orders' => Order::count(),
            'categories' => Category::count(),
            'coupons' => Coupon::count(),
            'items' => Item::count(),
            'faqs' => Faq::count(),
        ];
        return view('admin.dashboard', compact('dashboard'));
    }
}
