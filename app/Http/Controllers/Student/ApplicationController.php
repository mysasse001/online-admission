<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ApplicationController extends Controller
{
    public function create(){
        $user=auth()->user();
        // $tertiary=$user->profile::where('level',)->get();
        return view('student.application.personal',compact('user'));
    }

    public function applyAdmission(){
        $user=auth()->user();
        return view('student.application.admission',compact('user'));
    }

    public function intakeAdmission(){
        $user=auth()->user();
        return view('student.application.intake',compact('user'));
    }
}
