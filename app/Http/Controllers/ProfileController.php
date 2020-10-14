<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;
use PDF;

class ProfileController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth']);
    }

    public function primary(Request $request){
        $user=auth()->user();

        $data=$request->validate([
            'name'=>[''],
            'mname'=>[''],
            'surname'=>[''],
            'contact'=>[''],
            'country_id'=>[''],
            'email'=>['']

        ]);

        $user->name=$data['name'];
        $user->mname=$data['mname'];
        $user->surname=$data['surname'];
        $user->profile->contact=$data['contact'];
        $user->profile->country_id=$data['country_id'];
        $user->email=$data['email'];

        $user->push();

        return back();

    }


    public function tertiary(Request $request){
        $user=auth()->user();
        $data=$request->validate([
            'examined_by_id'=>['required'],
            'education_system_id'=>['required'],
            'course_studied'=>['required'],
            'institution_name'=>['required'],
            'index_exam_reg'=>['required'],
            'name_on_certificate'=>['required'],
            'grade_score'=>['required'],
            'tertiary_year_from'=>[],
            'tertiary_year_to'=>[]

        ]);
        $user->profile->examined_by_id=$data['examined_by_id'];
        $user->profile->education_system_id=$data['education_system_id'];
        $user->profile->institution_name=$data['institution_name'];
        $user->profile->course_studied=$data['course_studied'];
        $user->profile->index_exam_reg=$data['index_exam_reg'];
        $user->profile->name_on_certificate=$data['name_on_certificate'];
        $user->profile->grade_score=$data['grade_score'];
        $user->profile->tertiary_year_from=$data['tertiary_year_from'];
        $user->profile->tertiary_year_to=$data['tertiary_year_to'];

        $user->push();
        return back();
    }

      public function secondary(Request $request){
          $user=auth()->user();
          $data=$request->validate([
            'secondary_school'=>['required'],
            'index_number_secondary'=>['required'],
            'grade_score_secondary'=>['required'],
            'secondary_year_to'=>['required'],
            'secondary_year_from'=>['required'],
          ]);


        $user->profile->index_number_secondary=$data['index_number_secondary'];
        $user->profile->secondary_school=$data['secondary_school'];
        $user->profile->secondary_year_from=$data['secondary_year_from'];
        $user->profile->secondary_year_to=$data['secondary_year_to'];
        $user->profile->grade_score_secondary=$data['grade_score_secondary'];

        $user->Push();
        return back();
      }

      public function primaryschool(Request $request){
          $user=auth()->user();
        $data=$request->validate([

            'primary_school'=>['required'],
            'index_number'=>['required'],
            'grade_score_primary'=>['required'],
            'primary_year_from'=>['required'],
            'primary_year_to'=>['required'],
        ]);
        $user->profile->primary_school=$data['primary_school'];
        $user->profile->index_number=$data['index_number'];
        $user->profile->grade_score_primary=$data['grade_score_primary'];
        $user->profile->primary_year_from=$data['primary_year_from'];
        $user->profile->primary_year_to=$data['primary_year_to'];

        $user->push();
        return back();
      }

    public function education(Request $request){

        $user=auth()->user();
        $data=$request->validate([
            'examined_by_id'=>['required'],
            'education_system_id'=>['required'],
            'course_studied'=>['required'],
            'institution_name'=>['required'],
            'index_exam_reg'=>['required'],
            'name_on_certificate'=>['required'],
            'primary_school'=>['required'],
            'index_number'=>['required'],
            'grade_score_primary'=>['required'],
            'grade_score'=>['required'],
            'primary_year_from'=>['required'],
            'primary_year_to'=>['required'],
            'primary_year_to'=>['required'],
            'images*0'=>['required'],
            'tertiary_year_from'=>[],
            'tertiary_year_to'=>[]
        ]);

        $user->profile->examined_by_id=$data['examined_by_id'];
        $user->profile->education_system_id=$data['education_system_id'];
        $user->profile->institution_name=$data['institution_name'];
        $user->profile->course_studied=$data['course_studied'];
        $user->profile->index_exam_reg=$data['index_exam_reg'];
        $user->profile->name_on_certificate=$data['name_on_certificate'];
        $user->profile->primary_school=$data['primary_school'];
        $user->profile->index_number=$data['index_number'];
        $user->profile->grade_score_primary=$data['grade_score_primary'];
        $user->profile->grade_score=$data['grade_score'];
        $user->profile->index_number_secondary=$data['index_number_secondary'];
        $user->profile->secondary_school=$data['secondary_school'];
        $user->profile->secondary_year_from=$data['secondary_year_from'];
        $user->profile->secondary_year_to=$data['secondary_year_to'];
        $user->profile->primary_year_from=$data['primary_year_from'];
        $user->profile->primary_year_to=$data['primary_year_to'];
        $user->profile->grade_score_secondary=$data['grade_score_secondary'];
        $user->profile->tertiary_year_from=$data['tertiary_year_from'];
        $User->profile->tertiary_year_to=$data['tertiary_year_to'];



        $user->push();

        if ($request->has('images')) {

            $images = Collection::wrap($request->file('images'));

            $images->each(function ($image) use ($user) {

                //Original Image
                $url = $image->store('uploads/images', 'public');

                //Upload & resize the thumbnail
                $thumb_url = $image->store('uploads/images/thumbnails', 'public');

                Image::make(public_path("/storage/{$thumb_url}"))->fit(400, 400)->save();

                //Persist the record of the image uploaded
                $user->profile->images()->create([
                    'url' => "/storage/{$url}",
                    'thumb_url' => "/storage/{$thumb_url}"
                ]);

            });
        }
       return back();
    }

    public function personal(Request $request){
        $user=auth()->user();
        $data=$request->validate([
            'surname'=>[''],
            'gender'=>['required'],
            'birth'=>['required'],
            'nationality'=>['required'],
            'identification'=>['required'],
            'marital'=>['required'],
            'religion'=>['required'],
            'images*0'=>['required'],
            'birth_certificate'=>['required']
        ]);

        $user->surname=$data['surname'];
        $user->profile->gender=$data['gender'];
        $user->profile->birth=$data['birth'];
        $user->profile->nationality=$data['nationality'];
        $user->profile->identification=$data['identification'];
        $user->profile->marital=$data['marital'];
        $user->profile->religion=$data['religion'];
        $user->profile->birth_certificate=$data['birth_certificate'];

        $user->push();

        if ($request->has('images')) {

            $images = Collection::wrap($request->file('images'));

            $images->each(function ($image) use ($user) {

                //Original Image
                $url = $image->store('uploads/avatars', 'public');

                //Upload & resize the thumbnail
                $thumb_url = $image->store('uploads/avatars/thumbnails', 'public');

                Image::make(public_path("/storage/{$thumb_url}"))->fit(400, 400)->save();

                //Persist the record of the image uploaded
                $user->profile->images()->create([
                    'url' => "/storage/{$url}",
                    'thumb_url' => "/storage/{$thumb_url}"
                ]);

            });
        }

         return back();

    }

    public function work(Request $request){
        $user=auth()->user();
        $data=$request->validate([
            'surname'=>[],
            'name'=>[],
            'mname'=>[],
            'employer_name'=>[],
            'designation'=>[],
            'assignment'=>[],
            'work_year_from'=>[],
            'work_year_to'=>[]
        ]);

        $user->surname=$data['surname'];
        $user->name=$data['name'];
        $user->mname=$data['mname'];
        $user->profile->employer_name=$data['employer_name'];
        $user->profile->designation=$data['designation'];
        $user->profile->assignment=$data['assignment'];
        $user->profile->work_year_from=$data['work_year_from'];
        $user->profile->work_year_to=$data['work_year_to'];

        $user->push();
        return back();
    }

    public function contact(Request $request){
        $user=auth()->user();
        $data=$request->validate([
            'surname'=>[],
            'mname'=>[],
            'name'=>[],
            'country_id'=>[],
            'contact'=>[],
            'email'=>[],
            'postal_code'=>[],
            'postal_address'=>[],
            'town'=>[],
            'nationality'=>[],
            'county'=>[],
            'sub_county'=>[],
            'location'=>[],
            'sub_location'=>[],
            'landmark'=>[],
            'alternative_contact'=>[],

        ]);

        $user->surname=$data['surname'];
        $user->name=$data['name'];
        $user->mname=$data['mname'];
        $user->profile->country_id=$data['country_id'];
        $user->profile->contact=$data['contact'];
        $user->email=$data['email'];
        $user->profile->postal_code=$data['postal_code'];
        $user->profile->postal_address=$data['postal_address'];
        $user->profile->town=$data['town'];
        $user->profile->nationality=$data['nationality'];
        $user->profile->alternative_contact=$data['alternative_contact'];

        $user->push();
        return back();
    }

    public function level(Request $request){
        $user=auth()->user();
        $data=$request->validate([
            'level'=>[],

        ]);
        $user->profile->level=$data['level'];
        $user->push();
        return back();
    }

    public function nextkin(Request $request){
        $user=auth()->user();
        $data=$request->validate([
            'kin_names'=>[],
            'relationship'=>[],
            'kin_contact'=>[],
            'kin_country'=>[],
            'kin_email'=>[],
            'kin_postal_address'=>[],
            'kin_postal_code'=>[],
            'kin_town'=>[],
            'kin_nationality'=>[],
            'kin_alternative_contact'=>[],
        ]);

        $user->profile->kin_names=$data['kin_names'];
        $user->profile->relationship=$data['relationship'];
        $user->profile->kin_contact=$data['kin_contact'];
        $user->profile->kin_country=$data['kin_country'];
        $user->profile->kin_email=$data['kin_email'];
        $user->profile->kin_postal_address=$data['kin_postal_address'];
        $user->profile->kin_postal_code=$data['kin_postal_code'];
        $user->profile->kin_town=$data['kin_town'];
        $user->profile->kin_nationality=$data['kin_nationality'];
        $user->profile->kin_alternative_contact=$data['kin_alternative_contact'];

        $user->push();
        return back();
    }


}
