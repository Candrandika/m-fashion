<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    public $keyType = "string";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function product_detail(): BelongsTo
    {
        return $this->belongsTo(ProductDetail::class)->where('is_delete',0);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->where('is_delete',0);
    }
}
