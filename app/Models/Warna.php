<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warna extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    public $keyType = "string";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function product_details(): HasMany
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_details')->where('sizes.is_delete',0);
    }
}
