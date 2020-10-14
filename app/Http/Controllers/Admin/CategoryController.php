<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);

        auth()->user()->categories()->create($data);
        return back();
    }

    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,Category $category){
        $data=$request->validate([
            'name'=>[]
        ]);

        $category->update($data);
        return redirect()->route('category.index');
    }

    public function destroy(Category $category){
        $category->delete();
        return back();
    }
}
