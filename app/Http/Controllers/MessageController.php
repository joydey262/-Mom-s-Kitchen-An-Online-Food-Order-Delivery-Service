<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'msg' => ['required'],
        ]);

        Message::create(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'phone' => $request->phone, 'msg' => $request->msg]);
      
        return redirect()->back();
    }
}
