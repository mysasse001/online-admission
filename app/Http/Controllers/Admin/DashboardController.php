<?php

namespace App\Http\Controllers\Admin;
use PDF;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function dashboard(){

        return view('admin.index');
    }

    public function users(){
        $users = User::where('admin',0)->get();
        return view('admin.users.index',compact('users'));
    }

    public function downloadusers(User $user){
        $pdf = PDF::loadView('pdf', compact('user'));
        
        return $pdf->download('student.pdf');
    }
}
