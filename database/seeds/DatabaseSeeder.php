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
        factory(App\Cicles::class,20)->create();
        $admin=App\User::create([
            'name'=>'Admin',
            'surname'=>'Admin',
            'email'=>'admin@admin.com',
            'email_verified_at' => now(),
            'password'=>bcrypt('admin'),
            'type'=>'A',
            'actived'=>'1',
            'cicle_id'=>'1',
            'remember_token' => Str::random(10)
        ]);
        // $this->call(UsersTableSeeder::class);
        
        factory(App\Articles::class,20)->create();
        factory(App\User::class,20)->create();
        factory(App\User::class,20)->create();
        factory(App\Offers::class,20)->create();
        factory(App\Requirements::class,20)->create();
        factory(App\Applied::class,20)->create();
        
        

    }
}
