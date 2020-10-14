<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

    public function messageuser(){
        return $this->belongsToMany(User::class,'message_user')->withTimestamps();
    }

    public function reply(){
        return $this->morphMany(Reply::class,'replyable');
    }

}
