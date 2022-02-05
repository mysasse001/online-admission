<?php

namespace App\Http\Controllers\Student;

use App\Models\Category;
use App\Models\Programme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Location;
use App\Models\ModeOfStudy;
use App\Models\PaymentOption;

class ApplicationController extends Controller
{
    public function create(){
        $user=auth()->user();
        // $tertiary=$user->profile::where('level',)->get();
        $programmeCategories = Category::has('programmes')->orderBy('name')->get();
        return view('student.application.personal',compact('user','programmeCategories'));
    }

    public function applyAdmission(){
        $user=auth()->user();
        $programmeCategories = Category::has('programmes')->orderBy('name')->get();
        return view('student.application.admission',compact('user','programmeCategories'));
    }

    public function intakeAdmission(Category $category){
        $user=auth()->user();

        return view('student.application.intake',compact('user','category'));
    }

    public function completeApplication(Programme $programme)
    {
        $locations = Location::orderBy('location')->get();
        $modeOfStudies = ModeOfStudy::orderBy('name')->get();
        return view('student.application.intake.application',compact('programme','locations','modeOfStudies'));
    }

    public function completeApplication2(Programme $programme)
    {
        $paymentOptions = PaymentOption::orderBy('name')->get();
        $locations = Location::orderBy('location')->get();
        return view('student.application.intake.application2',compact('programme','locations','paymentOptions'));
    }

    public function store(Request $request,Programme $programme)
    {
        // dd('send email and sms to appliacnt and the main adminstrators');
        
            $data = $request->validate([
                'location_id'=>'required',
                'user_id'=>'',
                'mode_of_study_id'=>'required'
              ]);
              $data['programme_id'] = $programme->id;
              $data['application_status_id'] = 1;
              $data['ref_no'] =  rand(9999,999999999);
               auth()->user()->application()->create($data);
               $programme->programmeuser()->attach(auth()->user()->id);
         return redirect()->route('completeApplicationStep2',['programme'=>$programme->slug])->with('success_message','You have successfully created an application');
    }

    public function destroy(Application $application)
    {
       $application->delete();
       return back()->with('success_message','You have successfully deleted your application');
    }
}
