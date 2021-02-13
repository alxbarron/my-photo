<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
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
