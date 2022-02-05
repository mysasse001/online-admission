<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOptionStep extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paymentOption()
    {
        return $this->belongsTo(PaymentOption::class);
    }
}
