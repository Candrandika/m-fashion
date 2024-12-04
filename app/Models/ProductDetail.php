<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDetail extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    public $keyType = "string";
    protected $primaryKey = "id";
    protected $guarded = [];


    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class)->where('is_delete',0);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Warna::class, 'warna_id', 'id')->where('is_delete',0);
    }
}
