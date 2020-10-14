<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
   public function storeReply(Request $request,Message $message){

    //    dd($request);

       $data=$request->validate([
           'message'=>[]
       ]);
       $message->reply()->create($data);

       return back();
   }
}
