<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs', compact('faqs'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'qst' => ['required', 'string', 'max:255', 'unique:faqs'],
            'ans' => ['required'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        Faq::create(['user_id' => $request->user()->id, 'qst' => $request->qst, 'ans' => $request->ans, 'status' => $request->status]);
        
        return redirect()->back();
    }

    public function update(Request $request){
        $this->validate($request, [
            'qst' => ['required', 'string', 'max:255', 'unique:faqs,qst,'.$request->id],
            'ans' => ['required'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $faq = Faq::find($request->id);

        if($faq){
            $faq->qst = $request->qst;
            $faq->ans = $request->ans;
            $faq->status = $request->status;
            $faq->save();
        }
        
        return redirect()->back();
    }

    public function delete(Request $request){
        $faq = Faq::find($request->id);

        if($faq){
            $faq->delete();
        }
        
        return redirect()->back();
    }
}
