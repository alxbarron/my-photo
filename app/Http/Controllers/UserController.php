<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display list of users that have favorited the 
     * most in that week.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentWeekNumber = date('W');
        // $photo = Photo::where('favorite', '=', 1)->first();
        // $updatedDate = $photo->updated_at->format("W");
        // dd($updatedDate);
        $users = User::whereHas('photos', function ($query) use ($currentWeekNumber) {
            $query->where('favorite', '=', 1);
            // $query->whereWeek('update_at', '=', $currentWeekNumber);
        })
            ->paginate(5);
        dd($users);
    }
}
