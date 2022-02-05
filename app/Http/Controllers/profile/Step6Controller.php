<?php

namespace App\Http\Controllers\profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Step6Controller extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'name'=>'required',
            'relationship_id'=>'required',
            'telephone'=>'required',
            'email'=>'required',
            'postal_address'=>'required',
            'postal_code'=>'required',
            'town'=>'required',
            'nationality'=>'required',
            'gender'=>'required',
            'identification_document_id'=>'',
            'title_id'=>'required',
            'identification_document_no'=>''
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if($user)
        {
            $user->nextOfKin->name = $data['name'];
            $user->nextOfKin->relationship_id = $data['relationship_id'] ;
           $user->nextOfKin->telephone =  $request->country_code.$request->telephone;
           $user->nextOfKin->email = $data['email']  ;
            $user->nextOfKin->postal_address = $data['postal_address'];
            $user->nextOfKin->postal_code = $data['postal_code'] ;
             $user->nextOfKin->town = $data['town'];
            $user->nextOfKin->nationality = $data['nationality'] ;
            $user->nextOfKin->gender = $data['gender'] ;
            $user->nextOfKin->identification_document_id = $data['identification_document_id'] ;
           $user->nextOfKin->title_id =  $data['title_id'];
           $user->nextOfKin->identification_document_no = $data['identification_document_no'];
   
           $user->push();
        }
        // auth()->user()->nextOfKin()->update($data);
        return back()->with('success_message','You have successuflly added your next of kin');
    }
}
