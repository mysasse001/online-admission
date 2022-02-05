<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class Step4Controller extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'organization'=>'',
            'designation'=>'',
            'assignment'=>'',
            'from'=>'',
            'to'=>''
        ]);

        auth()->user()->workExperiences()->create($data);

        return back()->with('success_message','You have added a work experience');
    }

    public function update(Request $request,WorkExperience $workExperience)
    {
        $data = $request->validate([
            'organization'=>'',
            'designation'=>'',
            'assignment'=>'',
            'from'=>'',
            'to'=>''
        ]);

        $workExperience->update($data);

        return back()->with('success_message','You have updated'." ".$workExperience->name);
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return back()->with('success_message','You have deleted'." ".$workExperience->name);

    }


}
