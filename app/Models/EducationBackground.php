<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationBackground extends Model
{
    use HasFactory;

  protected $guarded = [];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function examinedBy()
  {
      return $this->belongsTo(ExaminedBy::class);
  }

  public function educationSystem()
  {
      return $this->belongsTo(EducationSystem::class);
  }
}
