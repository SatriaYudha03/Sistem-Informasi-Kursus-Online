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
                'name' => 'Data Science',
                'slug' => 'data-science',
                'icon' => 'icons/data-analist.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'icon' => 'icons/Digital-Marketing.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'icon' => 'icons/web-dev.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'machine-learning',
                'icon' => 'icons/machine-learning-icon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
