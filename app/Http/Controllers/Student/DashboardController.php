<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth']);
    }

    public function index(){
        $user=auth()->user()->id;
        return view('student.index',compact('user'));
    }

    public function pdf(){
        $user=auth()->user();
        return view('student.pdf',compact('user'));
    }


    public function download_student(User $user){
        
        $pdf = PDF::loadView('pdf', compact('user'));
        
        return $pdf->download('student.pdf');
    }

     

}
