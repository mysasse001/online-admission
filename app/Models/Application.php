<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function applicationStatus()
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    public function modeOfStudy()
    {
        return $this->belongsTo(ModeOfStudy::class);
    }

    
}
