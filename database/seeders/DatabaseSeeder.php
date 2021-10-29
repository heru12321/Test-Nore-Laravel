<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "MulyadiHB",
            'email' => "muly@mail.com",
            'password' => bcrypt('1234'),
            'as' => 'Offlaner',
            'bio' => 'Simping jalan ninjaku',
            'address' => 'Wakanda 214 StreetClub',
            'image' => 'placeholder.jpg'
        ]);
    }
}
