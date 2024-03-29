<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\EducationSystem;
use App\Http\Controllers\Controller;

class EducationSystemController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index(){
        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.educationsystem.index');
        }else{
            return view('home');
        }
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);

        auth()->user()->educationSystem()->create($data);
        return back();
    }


    public function edit(EducationSystem $educationSystem){
        return view('admin.educationsystem.edit',compact('educationSystem'));
    }

    public function update(Request $request,EducationSystem $educationSystem){
        $data=$request->validate([
            'name'=>[]
        ]);

        $educationSystem->update($data);
        return redirect()->route('educationSystem.index');
    }

    public function destroy(EducationSystem $educationSystem){
        $educationSystem->delete();
        return back();
    }
}
