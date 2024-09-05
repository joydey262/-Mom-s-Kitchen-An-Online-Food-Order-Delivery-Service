<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::where('name', 'like', "%$request->search%")->orWhereHas('category', function ($query) use ($request){ $query->where('name', 'like', "%$request->search%");})->get();

        if($items->count()){
            return view('search.index', compact('items'));
        }

        abort(404);
    }
}
