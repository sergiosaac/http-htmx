<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hosts')->insert([
            'method' => Str::random(10),
            'header' => Str::random(10).'@gmail.com',
            'input' => 80,
            'url' => Str::random(10).'@gmail.com',
        ]);
    }
}
