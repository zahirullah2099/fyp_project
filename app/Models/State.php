<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function car(): HasMany
    {
         return $this->hasMany(Car::class);
    } 

    public function city(): HasMany
    {
         return $this->hasMany(City::class);
    } 
}
