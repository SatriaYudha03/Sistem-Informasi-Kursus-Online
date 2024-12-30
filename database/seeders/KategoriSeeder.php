<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategoris')->insert([
            [
                'name' => 'Data Analis',
                'slug' => 'data-analis',
                'icon' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Internet of Things',
                'slug' => 'iot',
                'icon' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'icon' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Desain Grafis',
                'slug' => 'desain-grafis',
                'icon' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
