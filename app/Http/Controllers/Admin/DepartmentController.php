<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index(){
        return view('admin.department.index');
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);

        auth()->user()->departments()->create($data);
        return back();
    }


    public function edit(Department $department){
        return view('admin.department.edit',compact('department'));
    }

    public function update(Request $request,Department $department){
        $data=$request->validate([
            'name'=>[]
        ]);

        $department->update($data);
        return redirect()->route('department.index');
    }

    public function destroy(Department $department){
        $department->delete();
        return back();
    }
}
