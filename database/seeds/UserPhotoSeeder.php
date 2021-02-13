<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Photo;

class UserPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $user = User::find($i);
            $photo = Photo::find($i);
            if ($user && $photo) {
                $user->photos()->save($photo);
            }
        }
    }
}
