<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function name(Request $request)
    {
        if($request->user()){
            $setting = Setting::first();
            if($setting){
                $setting->name = $request->name;
                $setting->save();
            }
        }

        return redirect()->back();
    }

    public function email(Request $request)
    {
        if($request->user()){
            $setting = Setting::first();
            if($setting){
                $setting->email = $request->email;
                $setting->save();
            }
        }

        return redirect()->back();
    }

    public function phone(Request $request)
    {
        if($request->user()){
            $setting = Setting::first();
            if($setting){
                $setting->phone = $request->phone;
                $setting->save();
            }
        }

        return redirect()->back();
    }

    public function logo(Request $request){
        $this->validate($request, [
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:1024'],
        ]);

        if($request->user()){
            $setting = Setting::first();
            if($setting){
                $logo = rand(111111111111,9999999999999).'.'.$request->logo->extension();

                if (!file_exists(storage_path('app/public/logo'))){
                    Storage::makeDirectory('public/logo');
                }

                if (Storage::disk('public')->exists('logo/'.$setting->logo)) {
                    Storage::disk('public')->delete('logo/'.$setting->logo);
                }

                $request->file('logo')->storeAs('logo', $logo, 'public');

                $setting->logo = $logo;
                $setting->save();
            }
        }
        
        return redirect()->back();
    }

    public function charge(Request $request)
    {
        if($request->user()){
            $setting = Setting::first();
            if($setting){
                $setting->delivery_charge = $request->charge;
                $setting->save();
            }
        }

        return redirect()->back();
    }
}
