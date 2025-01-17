<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'published_at',
        'previous',
        'next',
        'series_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->format('d \d\e F \d\e Y') : null;
    }

    public function getFormattedForHumansPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->diffForHumans() : null;
    }

    public function getPublishedAtTimestampAttribute()
    {
        return $this->published_at ? $this->published_at->timestamp : null;
    }
}