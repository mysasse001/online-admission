<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','surname','mname','role_id','country_code','telephone','postal_address','postal_code','town','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function design(){
        return $this->hasOne(Design::class);
    }


    //admin
    public function departments(){
        return $this->hasMany(Department::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function academicYears(){
        return $this->hasMany(AcademicYear::class);
    }

    public function intakes(){
        return $this->hasMany(Intake::class);
    }
    public function application(){
        return $this->hasMany(Application::class);
    }

    public function programmes(){
        return $this->hasMany(Programme::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function examinedBy(){
        return $this->hasMany(ExaminedBy::class);
    }

    public function educationSystem(){
        return $this->hasMany(EducationSystem::class);
    }

    //confirm programme you would like

    public function programmeuser(){
        return $this->belongsToMany(Programme::class)->withPivot('status','created_at','updated_at');
    }

    public function faq(){
        return $this->hasMany(Faq::class);
    }

    public function message(){
        return $this->hasMany(Message::class);
    }

    public function messageuser(){
        return $this->belongsToMany(Message::class,'message_user')->withTimestamps();
    }

    public function countries(){
        return $this->hasMany(Country::class);
    }

    public function applicationDeadlines()
    {
        return $this->hasMany(ApplicationDeadline::class);
    }

    public function reportingDates()
    {
        return $this->hasMany(ReportingDate::class);
    }

    //profile setup
    public function refereeContacts()
    {
        return $this->hasMany(RefereeContact::class);
    }

    public function nextOfKin()
    {
        return $this->hasOne(NextOfKin::class);
    }
    
    public function contactInformation()
    {
        return $this->hasOne(ContactInformation::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function educationBackgrounds()
    {
        return $this->hasMany(EducationBackground::class);
    }

    public function personalInformation()
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
