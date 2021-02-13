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
        factory(App\Models\User::class, 6)->create()->each(function ($user) {
        });

        $this->call([
            PhotoSeeder::class,
            UserPhotoSeeder::class
        ]);
    }
}
