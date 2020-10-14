<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MessageController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth']);
    }
    public function index(){
        return view('student.messsage.index');

    }

    public function create(){
        $users = User::where('admin',1)->get();
        return view('student.messsage.create',compact('users'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'to[]'=>[],
            'subject'=>[],
            'message'=>[],
            'images*0'=>[]
        ]);
        $data['user_id']=auth()->user()->id;

        $message = Message::create($data);
        $message->messageuser()->syncWithoutDetaching($request->input('to',[]));

        if ($request->has('images')) {

            $images = Collection::wrap($request->file('images'));

            $images->each(function ($image) use ($message) {

                //Original Image
                $url = $image->store('uploads/images', 'public');

                //Upload & resize the thumbnail
                $thumb_url = $image->store('uploads/images/thumbnails', 'public');

                Image::make(public_path("/storage/{$thumb_url}"))->fit(400, 400)->save();

                //Persist the record of the image uploaded
                $message->images()->create([
                    'url' => "/storage/{$url}",
                    'thumb_url' => "/storage/{$thumb_url}"
                ]);

            });
        }

        return redirect()->route('student.message.index')->with('message','Your message is sent');
    }

    public function show(Message $message){
      return view('student.messsage.show',compact('message'));
    }

    public function destroy(Message $message){
        $message->delete();
        return redirect()->route('student.message.index')->with('message','Your message is deleted');
    }

    public function sent(){
        return view('student.messsage.sent');
    }
}
