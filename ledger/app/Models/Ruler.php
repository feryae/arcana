<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruler extends Model
{
    protected $fillable = ['slug', 'honorific', 'name', 'bio', 'notes'];

    public function kingdoms(): HasMany
    {
        return $this->hasMany(Kingdom::class);
    }

    public function getFullTitleAttribute(): string
    {
        return "{$this->honorific} {$this->name}";
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}