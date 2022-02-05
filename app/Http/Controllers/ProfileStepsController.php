<?php

namespace App\Http\Controllers;

use App\Models\DisabilityCondition;
use App\Models\EducationSystem;
use App\Models\ExaminedBy;
use App\Models\IdentificationDocument;
use App\Models\RefereeContact;
use App\Models\Relationship;
use App\Models\Title;
use Illuminate\Http\Request;

class ProfileStepsController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function step1()
    {
        $titles = Title::all();
        return view('profile.step1',compact('titles'));
    }

    public function step2()
    {
        $identificationDocuments = IdentificationDocument::orderBy('name')->get();
        $disabilityConditions = DisabilityCondition::get();
        if(is_null(auth()->user()->personalInformation)){
            auth()->user()->personalInformation()->create();
        }
        return view('profile.step2',compact('identificationDocuments','disabilityConditions'));
    }

    public function step3()
    {
        $examinedBys = ExaminedBy::orderBy('name')->get();
        $educationSystems = EducationSystem::orderBy('name')->get();
        return view('profile.step3',compact('examinedBys','educationSystems'));
    }

    public function step4()
    {
        return view('profile.step4');
    }

    public function step5()
    {
        if(is_null(auth()->user()->contactInformation)){
            auth()->user()->contactInformation()->create();
        }
        return view('profile.step5');
    }

    public function step6()
    {
        if(is_null(auth()->user()->nextOfKin)){
            auth()->user()->nextOfKin()->create();
        }

        $identificationDocuments = IdentificationDocument::get();
        $relationships = Relationship::orderBy('name')->get();
        $titles = Title::get();
        return view('profile.step6',compact('relationships','identificationDocuments','titles'));
    }

    public function step7()
    {
        return view('profile.step7');
    }

    public function step8()
    {
        $titles = Title::orderBy('name')->get();
        return view('profile.step8',compact('titles'));
    }

    public function step9()
    {
        return view('profile.step9');
    }

    public function step10()
    {
        return view('profile.step10');
    }

    public function step11()
    {
        return view('profile.step11');
    }
}
