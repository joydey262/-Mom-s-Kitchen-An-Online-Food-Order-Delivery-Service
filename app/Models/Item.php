<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'slug', 'category_id', 'quantity', 'stock', 'price', 'discount', 'desc', 'img', 'status', 'is_package'];

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 'Active');
    }

    public function scopeInActive(Builder $query): void
    {
        $query->where('status', 'Inactive');
    }

    public function scopeIsPackage(Builder $query): void
    {
        $query->where('is_package', 1);
    }

    public function scopeNotPackage(Builder $query): void
    {
        $query->where('is_package', 0);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
