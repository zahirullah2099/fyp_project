<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarType extends Model
{
     use HasFactory;
     public $timestamps = false;
     protected $fillable = ['name'];

     public function car(): HasMany
     {
          return $this->hasMany(Car::class);
     } 
}
