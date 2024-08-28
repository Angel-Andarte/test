<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'amount',
        'stripe_payment_intent_id',
    ];

       public function user()
       {
           return $this->belongsTo(User::class);
       }

       public function product()
       {
           return $this->belongsTo(Product::class);
       }

}
