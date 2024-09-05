<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'code', 'per', 'start', 'end'];

    protected $appends = ['start_at', 'format_start', 'end_at', 'format_end'];

    protected $casts = ['start' => 'datetime', 'end' => 'datetime'];

    public function getStartAtAttribute()
    {
        return $this->start->format('d M Y');
    }

    public function getFormatStartAttribute()
    {
        return $this->start->format('Y-m-d');
    }

    public function getFormatEndAttribute()
    {
        return $this->end->format('Y-m-d');
    }

    public function getEndAtAttribute()
    {
        return $this->end->format('d M Y');
    }
}
