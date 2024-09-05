<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ReplyNotify;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    }

    public function reply(Request $request){
        $this->validate($request, [
            'reply' => ['required'],
        ]);

        $message = Message::find($request->id);
        if($message){
            $message->reply = $request->reply;
            $message->save();

            Mail::to($message->email)->send(new ReplyNotify($request->reply));

            $admins = User::where('type', 'Admin')->get();
            Notification::send($admins, new MessageNotify(auth()->user()->name, 'Reply a message', $message->id));

        }

        return redirect()->back();
    }

    public function delete(Request $request){
        $message = Message::find($request->id);

        if($message){
            $message->delete();
        }
        
        return redirect()->back();
    }
}
