<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function programmeuser(){
        return $this->belongsToMany(User::class)->withPivot('status','created_at','updated_at');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class);
    }

    public function intake(){
        return $this->belongsTo(Intake::class);
    }
}
