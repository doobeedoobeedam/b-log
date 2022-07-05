<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::create([
            'image' => 'profile-sample.jpeg',
            'name' => 'Kusuma Wecitra',
            'username' => 'c.0zie',
            'email' => 'citrac491@gmail.com',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::factory(5)->create();           

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        \App\Models\Post::factory(25)->create();
    }
}
