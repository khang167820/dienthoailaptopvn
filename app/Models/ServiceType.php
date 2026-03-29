<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceType extends Model
{
    protected $fillable = [
        'name', 'slug', 'icon', 'description', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function repairs(): HasMany
    {
        return $this->hasMany(Repair::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
