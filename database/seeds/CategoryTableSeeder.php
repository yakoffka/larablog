<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\User;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_cat = rand(5, 9);
        $faker = Faker::create();
        $users_id = User::all()->pluck('id')->toArray();

        for ($i = 1; $i <= $num_cat; $i++) {
            $created_at = $faker->dateTime($max = 'now');
            $updated_at = $created_at;
            $editor_id = NULL;
            $published_at = NULL;
            $name = $faker->text(rand(10, 20));

            if (rand(0, 9) > 7) {
                $editor_id = $users_id[array_rand($users_id)];
                $updated_at = $faker->dateTimeBetween($created_at, $endDate = 'now');
            }

            if (rand(0, 9) > 7) {
                $published_at = $faker->dateTimeBetween($created_at, $endDate = 'now');
            }

            DB::table('categories')->insert([
                'author_id' => $users_id[array_rand($users_id)],
                'editor_id' => $editor_id,
                'name' => $name,
                'slug' => Str::slug($name, '-'),
                'description' => str_replace(['\'', '"', '-', ], '', $faker->realText(rand(500, 900))),
                'commentable' => (rand(0, 9) > 8) ? TRUE : FALSE,
                'rssable' => (rand(0, 9) > 8) ? TRUE : FALSE,
                'published_at' => $published_at,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
            echo "\tGenerate '$name' [$i/$num_cat categories];\n";
        }
    }
}
