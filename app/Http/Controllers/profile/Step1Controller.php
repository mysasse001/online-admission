<?php

namespace App\Http\Controllers\profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Step1Controller extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'surname'=>'',
            'firstname'=>'',
            'email'=>'',
            'name'=>'',
            'title_id'=>''
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if($user)
        {
            $user->surname = $data['surname'];
            $user->name = $data['name'];
           $user->telephone =  $request->country_code.$request->telephone;
           $user->email = $data['email'];
           $user->title_id = $data['title_id'];
           $user->push();
        }
        
        return back()->with('success_message','You have successfully updated your primary information');
    }
}
