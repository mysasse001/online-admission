<?php

namespace App\Http\Controllers;

use App\Models\ApplicationStatus;
use Illuminate\Http\Request;

class ApplicationStatusController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        if(auth()->user()->role->name == 'adminstrator')
        {
            $applicationStatuses = ApplicationStatus::all();
            return view('admin.applications.status.index',compact('applicationStatuses'));
        }
    }


    public function store(Request $request)
    {
       $data = $request->validate([
           'name'=>''
       ]);
       ApplicationStatus::create($data);
       return back()->with('success_message','You have successfully added a status');
    }

    public function update(Request $request,ApplicationStatus $applicationStatus)
    {
        $data = $request->validate([
            'name'=>''
        ]);
        $applicationStatus->update($data);
        return back()->with('success_message','You have successfully updated'.$applicationStatus->name);
    }

    public function destroy(ApplicationStatus $applicationStatus)
    {
        $applicationStatus->delete();
        return back()->with('success_message','You have successfully deleted'.$applicationStatus->name);
    }
}
