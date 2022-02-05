<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\EducationBackground;
use Illuminate\Http\Request;

class Step3Controller extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
             'examined_by_id'=>'',
             'education_system_id'=>'',
             'institution'=>'',
             'course'=>'',
             'from'=>'',
             'to'=>'',
             'index_no'=>'',
             'grade_score'=>'',
             'certificate'=>[],
        ]);
        

        if($request->hasFile('certificate')){

            $file = $request->file('certificate');
  
            $filename = $file->store('public/users/educationBackground/certificate','public');
  
            $data['certificate'] = '/storage/' . $filename;
        }
  
        auth()->user()->educationBackgrounds()->create($data);
        return back()->with('success_message','You have successfully added an education background');
    }

    public function update(Request $request,EducationBackground $educationBackground)
    {
        $data = $request->validate([
             'examined_by_id'=>'',
             'education_system_id'=>'',
             'institution'=>'',
             'course'=>'',
             'from'=>'',
             'to'=>'',
             'index_no'=>'',
             'grade_score'=>'',
             'certificate'=>['mimes:png,jpg,jpeg','ppt','pptx','doc','docx','pdf','xls','xlsx'],
        ]);
        
        if($request->hasFile('certificate')){

            $file = $request->file('certificate');
  
            $filename = $file->store('public/users/educationBackground/certificate','public');
  
            $data['certificate'] = '/storage/' . $filename;
        }
  
        $educationBackground->update($data);
        return back()->with('success_message','You have successfully updated your certificate');
    }

    public function destroy(EducationBackground $educationBackground)
    {
        $educationBackground->delete();
        return back()->with('success_message','You have successfully deleted a certificate');
    }
}
