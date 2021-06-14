<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@com.com',
            'password' => 'admin1admin',
            'level' => '999'
        ]);

        $user = User::factory()->create();

        Post::factory(5)->create([
            'author_id' => $user->id
        ]);

        $user2 = User::factory()->create();

        Post::factory(7)->create([
            'author_id' => $user2->id
        ]);
    }
}
