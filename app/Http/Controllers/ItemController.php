<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function slug($slug)
    {
        $item = Item::where('slug', $slug)->active()->first();

        if($item){
            return view('item.slug', compact('item'));
        }

        abort(404);
    }
}
