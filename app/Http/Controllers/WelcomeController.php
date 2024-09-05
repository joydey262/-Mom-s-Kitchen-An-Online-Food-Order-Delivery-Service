<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Package;
use App\Models\Setting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->get();
        $items = Item::active()->notPackage()->get();
        $packages = Item::active()->isPackage()->get();
        // $packages = Package::active()->get();
        return view('welcome', compact('categories', 'items', 'packages'));
    }
}
