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
        // $this->call(UsersTableSeeder::class);
        factory(App\Cicles::class,20)->create();
        factory(App\Articles::class,20)->create();
        factory(App\Users::class,20)->create();
        factory(App\Offers::class,20)->create();
        factory(App\Requirements::class,20)->create();
        factory(App\Applieds::class,20)->create();
    }
}
