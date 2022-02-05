<?php

namespace App\Http\Controllers\profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Step2Controller extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'identification_document_id'=>'required',
            'disability_condition_id'=>'required',
            'gender'=>'required',
            'marital'=>'required',
            'religion'=>'required',
            'day'=>'required',
            'month'=>'required',
            'year'=>'required',
            'nationality'=>'required',
            'identification_document_no'=>'required',
            'avatar'=>'',
            'medical'=>'',
            'activities'=>'',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if($request->hasFile('avatar')){

            $file = $request->file('avatar');
  
            $filename = $file->store('public/users/avatars','public');
  
            $data['avatar'] = '/storage/' . $filename;

            $user->personalInformation->avatar = $data['avatar'];
        }

        if($user)
        {
            $user->personalInformation->identification_document_id = $data['identification_document_id'];
            $user->personalInformation->disability_condition_id = $data['disability_condition_id'];
            $user->personalInformation->gender = $data['gender'] ;
            $user->personalInformation->marital = $data['marital'] ;
            $user->personalInformation->religion = $data['religion'] ;
            $user->personalInformation->day = $data['day'] ;
            $user->personalInformation->month = $data['month'] ;
            $user->personalInformation->year = $data['year'] ;
            $user->personalInformation->nationality = $data['nationality'] ;
            $user->personalInformation->medical = $request->medical;
            $user->personalInformation->activities = $request->activities;
            $user->personalInformation->identification_document_no = $data['identification_document_no'] ;
           
           $user->push();
        }
        return back()->with('success_message','You have successfully updated your primary information');
    }
}
