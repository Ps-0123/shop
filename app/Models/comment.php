<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class comment extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'content',
        'status',
    ];

    public function writer(): BelongsTo{
           return $this->belongsTo(User::class,'user_id');
    }
    public function Product() : BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
