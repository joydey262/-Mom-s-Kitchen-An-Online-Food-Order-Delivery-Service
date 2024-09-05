<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'img' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:1024'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        if($request->user()){

            $img = rand(111111111111,9999999999999).'.'.$request->img->extension();

            if(!file_exists(storage_path('app/public/category'))){
                Storage::makeDirectory('public/category');
            }

            $request->file('img')->storeAs('category', $img, 'public');

            
            Category::create(['user_id' => $request->user()->id, 'name' => $request->name, 'img' => $img, 'status' => $request->status]);
        }
        
        return redirect()->back();
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,'.$request->id],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $category = Category::find($request->id);

        if($category){

            if($request->file('img')){

                $this->validate($request, [
                    'img' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:1024'],
                ]);
                
                $img = rand(111111111111,9999999999999).'.'.$request->img->extension();

                if(!file_exists(storage_path('app/public/category'))){
                    Storage::makeDirectory('public/category');
                }

                if (Storage::disk('public')->exists('category/'.$category->img)) {
                    Storage::disk('public')->delete('category/'.$category->img);
                }

                $request->file('img')->storeAs('category', $img, 'public');
            }else{
                $img = $category->img;
            }

            $category->name = $request->name;
            $category->img = $img;
            $category->status = $request->status;
            $category->save();
        }
        
        return redirect()->back();
    }

    public function delete(Request $request){
        $category = Category::find($request->id);

        if($category){
            if (Storage::disk('public')->exists('category/'.$category->img)) {
                Storage::disk('public')->delete('category/'.$category->img);
            }
            $category->delete();
        }
        
        return redirect()->back();
    }
}
