<?php

use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            //Photo::create(['id' => $i, 'title' => "Hello $i", 'url' => "url", 'thumbnail' => "Hello123 Thu $i"]);
        }
    }
}
