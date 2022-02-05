<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function index(){
        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.category.index');
        }else{
            return view('home');
        }
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[''],
            'amount'=>''
        ]);

        auth()->user()->categories()->create($data);
        return back();
    }

    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,Category $category){
        $data=$request->validate([
            'name'=>[''],
            'amount'=>''
        ]);

        $category->update($data);
        return redirect()->route('category.index');
    }

    public function destroy(Category $category){
        $category->delete();
        return back();
    }
}
