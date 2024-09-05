<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function name(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if($request->user()){
            $user = User::find($request->user()->id);
            if($user){
                $user->name = $request->name;
                $user->save();
            }else{
                Auth::logout();
                return redirect()->route('welcome');
            }
        }

        return redirect()->back();
    }

    public function email(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email', 'max:255'],
        ]);

        if($request->user()){
            $user = User::find($request->user()->id);
            if($user){
                $user->email = $request->email;
                $user->save();
                if($user->wasChanged('email')){
                    $user->email_verified_at = null;
                    $user->save();
                }
            }else{
                Auth::logout();
                return redirect()->route('welcome');
            }
        }

        return redirect()->back();
    }

    public function phone(Request $request){
        $this->validate($request, [
            'phone' => ['required', 'string', 'max:255'],
        ]);

        if($request->user()){
            $user = User::find($request->user()->id);
            if($user){
                $user->phone = $request->phone;
                $user->save();
            }else{
                Auth::logout();
                return redirect()->route('welcome');
            }
        }
        
        return redirect()->back();
    }

    public function password(Request $request){
        $this->validate($request, [
            'current_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        if(Hash::check($request->current_password, $user->password)){
            $user->update(['password' => Hash::make($request->password)]);
        }
        
        return redirect()->back();
    }

    public function picture(Request $request){
        $this->validate($request, [
            'img' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:1024'],
        ]);

        if($request->user()){
            $user = User::find($request->user()->id);
            if($user){
                $img = rand(111111111111,9999999999999).'.'.$request->img->extension();

                if (!file_exists(storage_path('app/public/profile'))){
                    Storage::makeDirectory('public/profile');
                }

                if (Storage::disk('public')->exists('profile/'.$user->img)) {
                    Storage::disk('public')->delete('profile/'.$user->img);
                }

                $request->file('img')->storeAs('profile', $img, 'public');

                $user->img = $img;
                $user->save();
            }else{
                Auth::logout();
                return redirect()->route('welcome');
            }
        }
        
        return redirect()->back();
    }
}
