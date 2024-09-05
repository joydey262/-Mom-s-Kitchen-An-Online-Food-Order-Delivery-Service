<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'address_id', 'trans_id', 'coupon', 'payment_method', 'sub_total', 'delivery_charge', 'discount', 'discountable', 'payable', 'payment', 'status', 'deliver_id', 'reservation'];

    protected $casts = ['reservation' => 'datetime',];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function deliver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
