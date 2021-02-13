<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display list of users that have favorited the 
     * most in current week - Show only on weekdays
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userModel = new User;
        $usersList = $userModel->getWithMostFavoritedWeek();
        foreach ($usersList as $user) {
            echo $user->name . ' - ' . $user->id . '|| ';
        }
        // $day = date('w');
        // $weekStart = date("Y-m-d h:i:s", strtotime('-' . $day . ' days'));

        // $users = User::whereHas('photos', function ($query) use ($weekStart) {
        //     $query->where([
        //         ['favorite', '=', 1],
        //         ['updated_at', '>=', $weekStart]
        //     ]);
        // })
        //     ->paginate(5);
        // dd($users);
    }
}
