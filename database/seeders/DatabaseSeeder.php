<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => "Arry Kusuma Putra",
            'username' => "rryputra",
            'password' => "123",
            'bio' => "Halo, perkenalkan saya Arry Kusuma Putra, tinggal di kota Banjarbaru.",
        ]);
        User::factory(20)->create();

        PostCategory::create([
            'name' => 'General',
            'slug' => 'general'
        ]);
        PostCategory::create([
            'name' => 'Technology',
            'slug' => 'technology',
        ]);
        PostCategory::create([
            'name' => 'Government',
            'slug' => 'government'
        ]);
        PostCategory::create([
            'name' => 'Game',
            'slug' => 'game'
        ]);

        Post::create([
            'user_id' => 1,
            'post_category_id' => 1,
            'body' => "Selamat datang di tewiter, ini adalah sebuah projek website gabut yang ingin menyerupai website Twitter, dibuat oleh Arry Kusuma Putra (Pemilik Website). Silahkan untuk mencoba login, membuat postingan, dan hal lainnya!."
        ]);
        Post::factory(30)->create();
    }
}
