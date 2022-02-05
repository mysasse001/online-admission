<?php

namespace App\Http\Controllers;

use App\Models\ApplicationDeadline;
use Illuminate\Http\Request;

class ApplicationDeadlinesController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function index(){
        $applicationDeadlines = ApplicationDeadline::latest()->get();
        return view('admin.applicationDeadline.index',compact('applicationDeadlines'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>[]
        ]);

        auth()->user()->applicationDeadlines()->create($data);
        return back();
    }


    public function update(Request $request,ApplicationDeadline $applicationDeadline){
        $data=$request->validate([
            'name'=>[]
        ]);

        $applicationDeadline->update($data);
        return redirect()->route('applicationDeadline.index');
    }

    public function destroy(ApplicationDeadline $applicationDeadline){
        $applicationDeadline->delete();
        return back();
    }

}
