<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        if(auth()->user()->role->name == 'adminstrator'){
            return view('admin.applications.index');
        }else{
            return view('home');
        }

    }
}
