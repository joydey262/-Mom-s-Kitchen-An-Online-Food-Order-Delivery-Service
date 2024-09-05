<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $categories = Category::active()->get();
        return view('admin.items', compact('items', 'categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:items'],
            'category' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'stock' => ['required'],
            'discount' => ['required'],
            'desc' => ['required'],
            'img' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:1024'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $img = rand(111111111111,9999999999999).'.'.$request->img->extension();

        if(!file_exists(storage_path('app/public/item'))){
            Storage::makeDirectory('public/item');
        }

        $request->file('img')->storeAs('item', $img, 'public');

        Item::create(['user_id' => $request->user()->id, 'category_id' => $request->category, 'name' => $request->name, 'slug' => Str::slug($request->name), 'price' => $request->price, 'quantity' => $request->quantity, 'stock' => $request->stock, 'discount' => $request->discount, 'img' => $img, 'desc' => $request->desc, 'status' => $request->status, 'is_package' => $request->package ? 1 : 0]);
        
        return redirect()->back();
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:items,name,'.$request->id],
            'category' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'stock' => ['required'],
            'discount' => ['required'],
            'desc' => ['required'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $item = Item::find($request->id);

        if($item){

            if($request->file('img')){

                $this->validate($request, [
                    'img' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:1024'],
                ]);
                
                $img = rand(111111111111,9999999999999).'.'.$request->img->extension();

                if(!file_exists(storage_path('app/public/item'))){
                    Storage::makeDirectory('public/item');
                }

                if (Storage::disk('public')->exists('item/'.$item->img)) {
                    Storage::disk('public')->delete('item/'.$item->img);
                }

                $request->file('img')->storeAs('item', $img, 'public');
            }else{
                $img = $item->img;
            }

            $item->name = Str::title($request->name);
            $item->category_id = $request->category;
            $item->slug = Str::slug($request->name);
            $item->price = $request->price;
            $item->quantity = $request->quantity;
            $item->stock = $request->stock;
            $item->discount = $request->discount;
            $item->desc = $request->desc;
            $item->img = $img;
            $item->status = $request->status;
            $item->is_package = $request->package ? 1 : 0;
            $item->save();
        }
        
        return redirect()->back();
    }

    public function delete(Request $request){
        $item = Item::find($request->id);

        if($item){
            if (Storage::disk('public')->exists('item/'.$item->img)) {
                Storage::disk('public')->delete('item/'.$item->img);
            }
            $item->delete();
        }
        
        return redirect()->back();
    }
}
