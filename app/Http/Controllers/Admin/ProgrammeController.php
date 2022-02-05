<?php

namespace App\Http\Controllers\Admin;

use App\Models\Programme;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ReportingDate;
use App\Models\Design;
use App\Models\ApplicationDeadline;
use App\Http\Controllers\Controller;

class ProgrammeController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth'])->except('show');
    }

    public function index(){
        if(request()->search)
        {
            $programmes = Programme::where('name','LIKE','%'.request()->search.'%')->paginate(10);
        }else{
            $programmes = Programme::latest()->paginate(10);
        }
        $home = Design::first();

        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.programme.index',compact('programmes'));
        }
        else{
            return redirect('home');
        }
    }

    public function create()
    {
        $applicationDeadlines = ApplicationDeadline::latest()->get();
        $reportingDates = ReportingDate::latest()->get();
        $home = Design::first();

        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.programme.create',compact('applicationDeadlines','reportingDates'));
        }
        else{
            return redirect('home');
        }
    }


    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'department_id'=>['required'],
            'intake_id'=>['required'],
            'academic_year_id'=>['required'],
            'details'=>['required'],
            'category_id'=>['required'],
            'application_deadline_id'=>['required'],
            'reporting_date_id'=>['required'],
            'specialization'=>[''],
            'duration'=>'',
            'tuition_fees'=>''
        ]);
  
        $data['slug'] = Str::slug($request->name);
  
        auth()->user()->programmes()->create($data);
        return redirect()->route('programme.index');
      }

      
    public function show(Programme $programme){
        return view('admin.programme.show',compact('programme'));
    }

    public function edit(Programme $programme){
        $applicationDeadlines = ApplicationDeadline::latest()->get();
        $reportingDates = ReportingDate::latest()->get();
        $home = Design::first();

        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.programme.edit',compact('programme','applicationDeadlines','reportingDates'));
        }
        else{
            return redirect('home');
        }
    }

    public function update(Request $request,Programme $programme){
        $data=$request->validate([
            'name'=>[],
            'Programme_id'=>[],
            'department_id'=>[],
            'intake_id'=>[],
            'academic_year_id'=>[],
            'details'=>[],
            'application_deadline_id'=>[''],
            'reporting_date_id'=>[''],
            'specialization'=>[''],
            'tuition_fees'=>''
        ]);

        $data['slug'] = Str::slug($request->name);

        $data['duration'] = $request->duration;

        $programme->update($data);
        return redirect()->route('programme.index');
    }

    public function statusUpdate(Request $request,Programme $programme)
    {
        $data = $request->validate([
            'status'=>'required'
        ]);

        $programme->update($data);

        return back()->with('success_message','You have successfully updated status to'." ".$programme->status);
    }

    public function destroy(Programme $programme){
        $programme->delete();
        return back();
    }

    //confirm application
    public function confirmapplication(Programme $programme){
        $user=auth()->user();
        $programme->programmeuser()->syncWithoutDetaching($user);

        return redirect()->route('student.dashboard')->with('success_message','');
    }

    public function applicationlist(Programme $programme){
        $home = Design::first();

        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.programme.list',compact('programme'));
        }
        else{
            return redirect('home');
        }
    }

    public function editapplicationlist(Programme $programme){
        $home = Design::first();

        if(auth()->user()->role->name == 'adminstrator')
        {
            return view('admin.programme.edit-programme-list',compact('programme'));
        }
        else{
            return redirect('home');
        }
    }

    public function updateapplicationdetails(Request $request,Programme $programme){

        $data = $request->validate([
            'status' => ['required'],
            'user_id' => ['numeric', 'required']
        ]);

        $programme->programmeuser()->sync([
            $data['user_id'] => [
                'status' => $data['status']
            ]
        ]);

        return back();
    }
}
