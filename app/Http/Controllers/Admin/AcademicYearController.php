<?php

namespace App\Http\Controllers\Admin;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcademicYearController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function index(){
        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.academicyear.index');
        }else{
            return view('home');
        }
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);

        auth()->user()->academicYears()->create($data);
        return back();
    }


    public function edit(AcademicYear $academicYear){
        return view('admin.academicyear.edit',compact('academicYear'));
    }

    public function update(Request $request,AcademicYear $academicYear){
        $data=$request->validate([
            'name'=>[]
        ]);

        $academicYear->update($data);
        return redirect()->route('academicyear.index');
    }

    public function destroy(AcademicYear $academicYear){
        $academicYear->delete();
        return back();
    }
}
