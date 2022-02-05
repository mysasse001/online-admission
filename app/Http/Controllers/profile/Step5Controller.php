<?php

namespace App\Http\Controllers\profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Step5Controller extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    
    public function store(Request $request)
    {

        $data = $request->validate([
            'telephone'=>'required',
            'email'=>'required',
            'postal_address'=>'required',
            'postal_code'=>'required',
            'town'=>'required',
            'nationality'=>'required',
            'province'=>'',
            'district'=>'',
            'constituency'=>''
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if($user)
        {
            $user->contactInformation->province = $data['province'];
            $user->contactInformation->district = $data['district'] ;
           $user->contactInformation->telephone =  $request->country_code.$request->telephone;
           $user->contactInformation->email = $data['email']  ;
            $user->contactInformation->postal_address = $data['postal_address'];
            $user->contactInformation->postal_code = $data['postal_code'] ;
             $user->contactInformation->town = $data['town'];
            $user->contactInformation->nationality = $data['nationality'] ;
            $user->contactInformation->constituency = $data['constituency'] ;
   
           $user->push();
        }
        // auth()->user()->nextOfKin()->update($data);
        return back()->with('success_message','You have successuflly added your contact information');
    }
}
