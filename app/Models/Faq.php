<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'qst', 'ans', 'status'];

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 'Active');
    }

    public function scopeInActive(Builder $query): void
    {
        $query->where('status', 'Inactive');
    }
}
