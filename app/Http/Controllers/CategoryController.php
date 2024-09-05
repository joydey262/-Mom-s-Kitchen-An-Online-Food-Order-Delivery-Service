<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function slug($slug)
    {
        $items = Item::whereHas('category', function ($query) use ($slug){ $query->where('name', Str::title($slug));})->get();

        if($items->count()){
            return view('category.slug', compact('items'));
        }

        abort(404);
    }
}
