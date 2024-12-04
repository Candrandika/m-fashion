<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    public $keyType = "string";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    
    public function details(): HasMany
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function product_images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class);
    }

    public function colors(): HasMany
    {
        return $this->hasMany(Warna::class);
    }

    public function favorite(): HasMany
    {
        return $this->hasMany(Favorite::class)->where('user_id',Auth::user()->id);
    }
}
