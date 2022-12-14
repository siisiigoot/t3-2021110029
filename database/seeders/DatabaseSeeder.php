<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\Author;
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
        $faker = Faker::create('id_ID');
        $faker->seed();
        for ($i = 0; $i < 3; $i++) {
            Author::create([
                "nama" => $faker->firstName . " " . $faker->lastName,
                "negara" => $faker->country
            ]);
        }

        for ($i = 0; $i < 4; $i++) {
            Book::create(
                [
                    'id' => $faker->isbn13(),
                    'judul' => $faker->sentence(rand(2, 4)),
                    'halaman' => $faker->numberBetween(100,500),
                    'kategori' => $faker->randomElement(['XXX', 'Novel', 'Komik', 'Biografi', 'Dongeng']),
                    'penerbit' => $faker->company,
                    // 'author_id' => $faker->numberBetween(1, 4)
                ]
            );
        }
    }
}
