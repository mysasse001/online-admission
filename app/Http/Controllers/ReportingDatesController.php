<?php

namespace App\Http\Controllers;

use App\Models\ReportingDate;
use Illuminate\Http\Request;

class ReportingDatesController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function index(){
        $reportingDates = ReportingDate::latest()->get();
        return view('admin.reportingDate.index',compact('reportingDates'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);

        auth()->user()->reportingDates()->create($data);
        return back();
    }


    public function update(Request $request,ReportingDate $reportingDate){
        $data=$request->validate([
            'name'=>[]
        ]);

        $reportingDate->update($data);
        return redirect()->route('reportingDate.index');
    }

    public function destroy(ReportingDate $reportingDate){
        $applicationDeadline->delete();
        return back();
    }

}
