<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'user_id',
        'city_id',
        'address',
        'phone',
        'description',
        'published_at', 
    ];

    // relation
    public function carType(): BelongsTo
    {
        return $this->belongsTo(CarType::class);
    }
    // --------------------------
    public function feulType(): BelongsTo
    {
        return $this->belongsTo(FeulType::class);
    }
    // --------------------------
    public function maker(): BelongsTo
    {
        return $this->belongsTo(Maker::class);
    }
    // --------------------------
    public function model(): BelongsTo
    {
        return $this->belongsTo(\App\Models\model::class);
    }
    // --------------------------
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // --------------------------
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'user_id');
    }
    // --------------------------
    public function features(): HasOne
    {
        return $this->hasOne(CarFeatures::class);
    }
    // --------------------------
    public function primaryImage(): HasOne
    {
        return $this->hasOne(CarImage::class)->oldestOfMany('position');
    }
    // --------------------------
    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    } 
    // --------------------------
    public function favouredUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favourite_cars');
    }

    public function getCreateDate(): string
    {
        return (new Carbon($this->created_at))->format('Y-m-d');
    }
}    
