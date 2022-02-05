<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function identificationDocument()
    {
        return $this->belongsTo(IdentificationDocument::class);
    }

    public function disabilityCondition()
    {
        return $this->belongsTo(DisabilityCondition::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
