<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('posts')->insert([
            'hasFeatured' => 'on',
            'featuredImage' => 'icon-tembak.png',
            'mime' => 'image/png',
            'original_filename' => 'icon-tembak.png',
            'categoriesId' => '1',
            'title' => $faker->word,
            'content' => $faker->sentence,
            'uploadedBy' => 'Admin',
        ]);
    }
}
