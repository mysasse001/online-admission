<?php

namespace App\Http\Controllers\Admin;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function __construct(){
        return $this->middleware(['auth'])->except('show');
    }

    public function index(){
        return view('admin.country.index');
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);

        auth()->user()->countries()->create($data);
        return back();
    }

    public function show(Country $country){
       return view('admin.Country.show',compact('country'));
    }


    public function edit(Country $country){
        return view('admin.country.edit',compact('country'));
    }

    public function update(Request $request,Country $country){
        $data=$request->validate([
            'name'=>[]
        ]);

        $country->update($data);
        return redirect()->route('country.index');
    }

    public function destroy(Country $country){
        $country->delete();
        return back();
    }

}
