<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getWithMostFavoritedWeek()
    {
        // $day = date('w');
        // $weekStart = date("Y-m-d h:i:s", strtotime('-' . $day . ' days'));

        // return $this->whereHas('photos', function ($query) use ($weekStart) {
        //     $query->where([
        //         ['favorite', '=', 1],
        //         ['updated_at', '>=', $weekStart]
        //     ]);
        // })
        //     ->paginate(5);
        return $this->whereHas('photos', function ($query) {
            $query->where('favorite', 1);
        })->get();
    }
}
