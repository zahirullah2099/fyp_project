<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarImage extends Model
{
    public $timestamps = false;
    protected $fillable = ['image_path', 'postition'];

    // --------------------------
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
