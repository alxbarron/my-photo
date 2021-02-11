<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title', 'albumId', 'placeholderId', 'url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
