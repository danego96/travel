<?php

namespace App\Models;

use App\Observers\TravelObserver;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

class Travel extends Model
{
     /** @use HasFactory<\Database\Factories\TravelFactory> */
     use HasFactory, Sluggable, HasUuids;

     protected $table = 'travels';

     protected $fillable = [
        'is_public',
        'slug',
        'name',
        'description',
        'number_of_days'
     ];

   /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function tours(): HasMany
    {
      return $this -> hasMany(Tour::class);
    }

    public function numberOfNights(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['number_of_days'] - 1
        );
    }
}
