<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
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

    public function colors()
    {
        return $this->belongsToMany(Warna::class, 'product_details')->where('warnas.is_delete',0);
    }
}
