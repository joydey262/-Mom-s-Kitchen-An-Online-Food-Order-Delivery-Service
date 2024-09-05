<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->get();
        return view('review.my-review', compact('products'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'rating' => ['required', 'numeric'],
            'review' => ['required'],
        ]);

        $product = Product::with('item')->find($request->id);

        if($product){
            $product->review()->create(['user_id' => $request->user()->id, 'product_id' => $product->id, 'item_id' => $product->item->id, 'desc' => $request->review, 'rating' => $request->rating]);
        }

        return redirect()->back();
    }
}
