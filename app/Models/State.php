<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
     use HasFactory;
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
