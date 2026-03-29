<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Repair extends Model
{
    protected $fillable = [
        'device_model_id', 'service_type_id', 'slug',
        'price', 'sale_price', 'warranty', 'repair_time',
        'short_description', 'content',
        'meta_title', 'meta_description', 'faq',
        'is_featured', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:0',
        'sale_price' => 'decimal:0',
        'faq' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function deviceModel(): BelongsTo
    {
        return $this->belongsTo(DeviceModel::class);
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class);
    }

    /**
     * Auto-generate slug from service type + device model
     * Example: "thay-man-hinh-iphone-15-pro-max"
     */
    protected static function booted(): void
    {
        static::creating(function (Repair $repair) {
            if (empty($repair->slug)) {
                $serviceType = ServiceType::find($repair->service_type_id);
                $deviceModel = DeviceModel::find($repair->device_model_id);
                if ($serviceType && $deviceModel) {
                    $repair->slug = Str::slug($serviceType->name . ' ' . $deviceModel->name);
                }
            }
        });
    }

    /**
     * Calculate discount percentage
     */
    public function getDiscountPercentAttribute(): ?int
    {
        if ($this->price && $this->sale_price && $this->price > 0) {
            return (int) round((($this->price - $this->sale_price) / $this->price) * 100);
        }
        return null;
    }

    /**
     * Get the display price (sale_price if available, otherwise price)
     */
    public function getDisplayPriceAttribute(): ?string
    {
        $price = $this->sale_price ?? $this->price;
        return $price ? number_format($price, 0, ',', '.') . 'đ' : 'Liên hệ';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
