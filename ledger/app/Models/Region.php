<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function kingdoms(): HasMany
    {
        return $this->hasMany(Kingdom::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}