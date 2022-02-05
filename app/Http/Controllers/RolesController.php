<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        if(auth()->user()->role->name == 'adminstrator')
        {
            $users = User::where('role_id','!=',1)->latest()->get();
            $roles = User::where('role_id',1)->latest()->get();
            return view('admin.roles.index',compact('users','roles'));
        }
        else{
            return redirect('home');
        }
    }

    public function adminAdd(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $user->update([
            'role_id'=>1
        ]);
        return back()->with('success_message','You have added'.$user->surname." ".'as an adminstrator');

    }

    public function adminRemove(Request $request,User $user)
    {
        $user->update([
            'role_id'=>2
        ]);

        return back()->with('success_message','You have removed'.$user->surname." ".'from being an adminstrator');
    }
}
