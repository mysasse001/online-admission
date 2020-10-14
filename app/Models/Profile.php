<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsToOne(User::class);
    }

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

    public function examinedBy(){
        return $this->belongsTo(ExaminedBy::class);
    }

    public function educationSystem(){
        return $this->belongsTo(EducationSystem::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
