<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Database\Factories\BlogPostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class,
            BlogCategoriesTableSeeder::class
        ]);

        // We can use both variants of seeding
        BlogPost::factory()->count(100)->create();
//        BlogPostFactory::new()->count(10)->create();
    }
}
