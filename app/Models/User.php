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
        'name', 'email','password','surname','mname'
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
        return $this->hasOne(Application::class);
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

}
