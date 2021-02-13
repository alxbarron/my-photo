<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * Display latest favorite photos picked by all
     * registered users - Should bew displayed only
     * on Saturdays and Sundays
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelPhoto = new Photo;
        $photos = $modelPhoto->getLatestFavorites();
        return view('photos.index', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return;
        }

        $rules = [
            'id' => 'required',
            'title' => 'required',
            'url' => 'required',
        ];

        $request->validate($rules);

        $photo = Photo::find($request->id);
        if (!$photo) {
            $photo = Photo::create([
                'id' => $request->id,
                'title' => $request->title,
                'url' => $request->url,
            ]);
        }

        $user->photos()->save($photo);

        return ["status" => "Photo saved to user $user->id"];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }


    public function isTodayWeekend()
    {
        $currentDate = new DateTime("now", new DateTimeZone("Europe/Amsterdam"));
        return $currentDate->format('N') >= 6;
    }
}
