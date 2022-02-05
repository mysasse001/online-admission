<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }

    public function identificationDocument()
    {
        return $this->belongsTo(IdentificationDocument::class);
    }
}
