<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionsController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function edit()
    {
        if(auth()->user()->role->name == 'adminstrator')
        {
            $instruction = Instruction::first();
            return view('admin.instructions.edit',compact('instruction'));
        }
    }

    public function update(Request $request,Instruction $instruction)
    {
        $data = $request->validate([
            'instruction'=>''
        ]);

        $instruction->update($data);
        return back()->with('success_message','You have successfully updated instructions');
    }
}
