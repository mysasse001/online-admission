<?php

namespace App\Http\Controllers\Admin;

use App\Models\Programme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgrammeController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth'])->except('show');
    }

    public function index(){
        return view('admin.programme.index');
    }

    public function create()
    {
        return view('admin.programme.create');
    }

    public function store(Request $request){
      $data=$request->validate([
          'name'=>[],
          'Programme_id'=>[],
          'department_id'=>[],
          'intake_id'=>[],
          'academic_year_id'=>[],
          'deadline'=>[],
          'reporting'=>[],
          'details'=>[]
      ]);

      auth()->user()->programmes()->create($data);
      return redirect()->route('programme.index');
    }

    public function show(Programme $programme){
        return view('admin.programme.show',compact('programme'));
    }


    public function edit(Programme $programme){
        return view('admin.programme.edit',compact('programme'));
    }

    public function update(Request $request,Programme $programme){
        $data=$request->validate([
            'name'=>[],
            'Programme_id'=>[],
            'department_id'=>[],
            'intake_id'=>[],
            'academic_year_id'=>[],
            'deadline'=>[],
            'reporting'=>[],
            'details'=>[]
        ]);

        $programme->update($data);
        return redirect()->route('programme.index');
    }

    public function destroy(Programme $programme){
        $programme->delete();
        return back();
    }

    //confirm application
    public function confirmapplication(Programme $programme){
        $user=auth()->user();
        $programme->programmeuser()->syncWithoutDetaching($user);

        return redirect()->route('student.dashboard')->with('success_message','');
    }

    public function applicationlist(Programme $programme){
        return view('admin.programme.list',compact('programme'));
    }

    public function editapplicationlist(Programme $programme){
        return view('admin.programme.edit-programme-list',compact('programme'));
    }

    public function updateapplicationdetails(Request $request,Programme $programme){

        $data = $request->validate([
            'status' => ['required'],
            'user_id' => ['numeric', 'required']
        ]);

        $programme->programmeuser()->sync([
            $data['user_id'] => [
                'status' => $data['status']
            ]
        ]);

        return back();
    }
}
