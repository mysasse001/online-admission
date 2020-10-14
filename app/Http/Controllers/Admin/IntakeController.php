<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intake;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntakeController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth'])->except('show');
    }

    public function index(){
        return view('admin.intake.index');
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);

        auth()->user()->intakes()->create($data);
        return back();
    }

    public function show(Intake $intake){
       return view('admin.intake.show',compact('intake'));
    }


    public function edit(Intake $intake){
        return view('admin.intake.edit',compact('intake'));
    }

    public function update(Request $request,Intake $intake){
        $data=$request->validate([
            'name'=>[]
        ]);

        $intake->update($data);
        return redirect()->route('intake.index');
    }

    public function destroy(Intake $intake){
        $intake->delete();
        return back();
    }
}
