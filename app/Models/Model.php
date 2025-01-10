<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Model extends EloquentModel
{
    public $timestamps = false;
    protected $fillable = ['name', 'maker_id'];

    public function maker(): BelongsTo
    {
        return $this->belongsTo(Maker::class);
    }

    public function car(): HasMany
    {
         return $this->hasMany(Car::class);
    } 
}
