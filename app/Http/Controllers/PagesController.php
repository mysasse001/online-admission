<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Instruction;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $categories = Category::has('programmes')->orderBy('name')->get();
        return view('pages.home',compact('categories'));
    }


    public function instructions()
    {
        $instruction = Instruction::first();
        return view('pages.instructions',compact('instruction'));
    }
}
