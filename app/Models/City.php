<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'state_id'];


    public function state(): BelongsTo
     {
          return $this->belongsTo(State::class);
     } 
     
    public function car(): HasMany
     {
          return $this->hasMany(Car::class);
     } 
}
