<?php

namespace App\Http\Controllers\admin;

use App\Models\Design;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth'])->except('index','show');
    }
    public function index(){

    
        $home = Design::first();

        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.design.index',compact('home'));
        }
        else{
            return redirect('home');
        }

    }


    public function create(){
        $home = Design::first();

        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.design.create');
        }
        else{
            return redirect('home');
        }
    }

    public function store(Request $request){

      $data =  $request->validate([
          'welcome'=>['required'],
          'name'=>['required'],
          'email'=>['email'],
          'telephone'=>['required'],
          'facebook'=>['url'],
          'twitter'=>['url'],
          'address'=>['required'],
          'about'=>['required'],
          'youtube'=>['url'],
          'logo'=>['mimes:png,jpg,jpeg']
      ]);

      if($request->hasFile('logo')){

          $file = $request->file('logo');

          $filename = $file->store('public/logo','public');

          $data['logo'] = '/storage/' . $filename;
      }

      $request->user()->design()->create($data);

      return back()->with('success_message','You have successfully');

    }

    public function edit(Design $home){
        $home = Design::first();

        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.design.edit',compact('home'));
        }
        else{
            return redirect('home');
        }
    }

    public function update(Request $request,Design $home){
        $data =  $request->validate([
            'welcome'=>['required'],
            'name'=>['required'],
            'email'=>['email'],
            'telephone'=>['required'],
            'facebook'=>['url'],
            'address'=>['required'],
            'about'=>['required'],
            'twitter'=>['url'],
            'youtube'=>['url'],
            'website_link'=>['']
        ]);



        if($request->hasFile('logo')){

            $file = $request->file('logo');

            $filename = $file->store('public/logo','public');

            $data['logo'] = '/storage/' . $filename;
        }

        $home->update($data);

        return redirect()->route('design.index')->with('success_message','You have successfuly updated the design');
    }
}
