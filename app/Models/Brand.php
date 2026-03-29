<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    protected $fillable = [
        'name', 'slug', 'logo', 'description',
        'meta_title', 'meta_description', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function deviceModels()
    {
        return $this->hasMany(DeviceModel::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
