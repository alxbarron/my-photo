<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['id', 'title', 'url', 'thumbnail', 'favorite'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
    }

    public function getLatestFavorites()
    {
        return $this->where('favorite', '=', 1)
            ->latest()
            ->limit(20)
            ->paginate(1);
    }
}
