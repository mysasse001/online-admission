<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExaminedBy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExaminedByController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function index(){
        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.examinedby.index');
        }else{
            return view('home');
        }
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);
        auth()->user()->examinedBy()->create($data);
        return back();

    }


    public function edit(ExaminedBy $examinedBy){
        return view('admin.examinedby.edit',compact('ExaminedBy'));
    }

    public function update(Request $request,ExaminedBy $examinedBy){
        $data=$request->validate([
            'name'=>[]
        ]);

        $examinedBy->update($data);
        return redirect()->route('examinedBy.index');
    }

    public function destroy(ExaminedBy $examinedBy){
        $examinedBy->delete();
        return back();
    }
}
