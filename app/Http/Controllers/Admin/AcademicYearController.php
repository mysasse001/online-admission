<?php

namespace App\Http\Controllers\Admin;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcademicYearController extends Controller
{
    public function index(){
        return view('admin.academicyear.index');
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
