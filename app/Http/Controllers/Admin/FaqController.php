<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth'])->except('front');
    }

    public function index(){
        return view('admin.faq.index');
    }

    public function store(Request $request){
$data=$request->validate([
    'question'=>[],
    'answer'=>[]
]);
        auth()->user()->faq()->create($data);
        return back();
    }

    public function edit(Faq $faq){
        return view('admin.faq.edit',compact('faq'));
    }

    public function update(Request $request,Faq $faq){
        $data=$request->validate([
          'question'=>[],
          'answer'=>[]
        ]);
        $faq->update($data);
        return redirect()->route('faq.index');
    }

    public function front(){
        return view('admin.faq.front');
    }

    public function destroy(Faq $faq){
        $faq->delete();
        return back();
    }
}
