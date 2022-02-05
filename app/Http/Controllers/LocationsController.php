<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $locations = Location::orderBy('location')->get();
        return view('admin.locations.index',compact('locations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'location'=>''
        ]);

        Location::create($data);
        return back()->with('success_message','You have successfully added a location');
    }


    public function Update(Request $request,Location $location)
    {
        $data = $request->validate([
            'location'=>''
        ]);

        $location->update($data);
        return back()->with('success_message','You have successfully updated'.$location->location);
    }


    public function destroy(Location $location)
    {

        $location->delete();
        return back()->with('success_message','You have successfully deleted'.$location->location);
    }
}
