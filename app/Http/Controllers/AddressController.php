<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function saved()
    {
        $addresses = Address::all();
        return view('saved-address', compact('addresses'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
        ]);

        Address::create(['user_id' => $request->user()->id, 'type' => $request->type, 'name' => $request->name, 'phone' => $request->phone]);
        
        return redirect()->back();
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
        ]);

        $address = Address::find($request->id);

        if($address){
            $address->type = $request->type;
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->save();
        }
        
        return redirect()->back();
    }
    
}
