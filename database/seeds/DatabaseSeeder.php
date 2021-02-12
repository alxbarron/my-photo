<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 6)->create()->each(function ($user) {
            $user->photos()
                ->saveMany(
                    factory(App\Photo::class, rand(3, 8))->make()
                );
        });
    }
}
