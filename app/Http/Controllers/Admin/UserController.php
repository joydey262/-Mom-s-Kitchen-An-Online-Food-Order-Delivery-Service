<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereNot('id', 1)->get();
        return view('admin.users', compact('users'));
    }

    public function update(Request $request){
        $user = User::find($request->id);

        if($user){
            if($user->type == 'User'){
                $user->type = 'Delivery Boy';
            }elseif($user->type == 'Delivery Boy'){
                $user->type = 'Admin';
            }else{
                $user->type = 'User';
            }
            $user->save();
        }
        
        return redirect()->back();
    }

    public function delete(Request $request){
        $user = User::find($request->id);

        if($user){
            if (Storage::disk('public')->exists('profile/'.$user->img)) {
                Storage::disk('public')->delete('profile/'.$user->img);
            }
            $user->delete();
        }
        
        return redirect()->back();
    }
}
