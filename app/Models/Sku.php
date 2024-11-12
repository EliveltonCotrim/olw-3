<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "product_id",
        "name",
        "price",
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->using(OrderSku::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(related: Feature::class)->using(FeatureSku::class);
    }

    public function product(): BelongsTo
    {
        return $this->belonsTo(Product::class);
    }
}