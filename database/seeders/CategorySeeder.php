<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $nowData = now();
        $data = [
            1 => [
                'id' => 1,
                'title' => 'Спорт',
                'slug' => 'sport',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            2 => [
                'id' => 2,
                'title' => 'Политика',
                'slug' => 'politics',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            3 => [
                'id' => 3,
                'title' => 'Экология',
                'slug' => 'ecology',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            4 => [
                'id' => 4,
                'title' => 'Экономика',
                'slug' => 'economy',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
            5 => [
                'id' => 5,
                'title' => 'Искусство',
                'slug' => 'art',
                'description' => fake()->text(100),
                'created_at' => $nowData,
                'updated_at' => $nowData,
            ],
        ];
        // for ($i = 0; $i < 10; $i++) {
        //     $data[] = [
        //         'title' => \fake()->jobTitle(),
        //         'slug' => \fake()->userName(),
        //         'description' => \fake()->text(100),
        //         'created_at' => \now(),
        //         'updated_at' => \now(),
        //     ];
        // }
        return $data;
    }
}
