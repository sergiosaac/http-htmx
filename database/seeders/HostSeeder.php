<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hosts')->insert([
            'host' => Str::random(10),
            'protocolo' => Str::random(10).'@gmail.com',
            'port' => 80,
        ]);
    }
}
