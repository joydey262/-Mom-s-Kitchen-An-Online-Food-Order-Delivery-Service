<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'img', 'status'];

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 'Active');
    }

    public function scopeInActive(Builder $query): void
    {
        $query->where('status', 'Inactive');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
