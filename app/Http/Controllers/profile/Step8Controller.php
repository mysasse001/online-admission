<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\RefereeContact;
use Illuminate\Http\Request;

class Step8Controller extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'postal_address'=>'required',
            'postal_code'=>'required',
            'town'=>'required',
            'nationality'=>'required',
            'gender'=>'',
            'title_id'=>''
        ]);

        $data['telephone'] = $request->country_code.$request->telephone;

        auth()->user()->refereeContacts()->create($data);

        return back()->with('success_message','You have successfully added a referee contact');
    }
   
    public function update(Request $request,RefereeContact $refereeContact)
    {
        $data = $request->validate([
            'name'=>'',
            'email'=>'',
            'postal_address'=>'',
            'postal_code'=>'',
            'town'=>'',
            'nationality'=>'',
            'gender'=>'',
            'title_id'=>''
        ]);

        $data['telephone'] = $request->country_code.$request->telephone;

        $refereeContact->update($data);

        return back()->with('success_message','You have successfully updated'." ".$refereeContact->name);
    }

    public function destroy(RefereeContact $refereeContact)
    {
        $refereeContact->delete();
        return back()->with('success_message','You have successfully deleted'." ".$refereeContact->name);
    }
    
}
