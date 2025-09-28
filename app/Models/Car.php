<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Car extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'mileage',
        'price',
        'description',
        'images',
        'fuel_type',
        'transmission',
        'body_type',
        'color',
        'engine_size',
        'is_featured',
        'is_sold',
        'contact_email',
        'contact_phone',
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_sold' => 'boolean',
        'price' => 'decimal:2',
    ];

    protected function images(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? json_decode($value, true) : [],
            set: fn ($value) => json_encode($value),
        );
    }

    public function getMainImageAttribute()
    {
        $images = $this->images;
        if (is_array($images) && count($images) > 0) {
            return $images[0];
        }
        return null;
    }

    public function getFormattedPriceAttribute()
    {
        return '£' . number_format($this->price, 0);
    }

    public function getFormattedMileageAttribute()
    {
        return number_format($this->mileage) . ' miles';
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_sold', false);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('make', 'like', "%{$search}%")
              ->orWhere('model', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }
}
