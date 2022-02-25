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
        factory(App\Article::class, 20)->create();
        factory(App\Category::class, 5)->create();
        factory(App\Comment::class, 40)->create();
        // factory(App\Like::class, 40)->create();

        factory(App\User::class)->create([
            "name" => "Alice",
            "email" => "alice@gmail.com",
        ]);
        factory(App\User::class)->create([
            "name" => "Bob",
            "email" => "bob@gmail.com",
        ]);
        factory(App\User::class)->create([
            "name" => "minkhant",
            "email" => "minkhant@gmail.com",
        ]);
        factory(App\User::class)->create([
            "name" => "minhtet",
            "email" => "minhtet@gmail.com",
        ]);

        $faker = Faker\Factory::create();
        foreach (range(1, 20) as $index) {
            factory(App\Like::class)->create([
                'article_id' => $faker->unique()->numberBetween($min = 1, $max = 20),
            ]);

        }
    }
}