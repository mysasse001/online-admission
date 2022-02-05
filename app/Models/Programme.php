<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    use HasFactory;

    protected $guarded= [];

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = $this->value;
    //     $this->attributes['slug'] = Str::slug($value);
    // }

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

    public function reportingDate()
    {
        return $this->belongsTo(ReportingDate::class);
    }

    public function applicationDeadline()
    {
        return $this->belongsTo(ApplicationDeadline::class);
    }
    
}
