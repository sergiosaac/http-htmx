<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('hosts')->insert([
            'host' => '10.118.1.57',
            'protocolo' => 'http',
            'port' => 8080,
        ]);

        DB::table('urls')->insert([
            'method' => 'get',
            'header' => '{"Accept":"application/json","Authorization":"Bearer 08oo6m3e9xhpChTgS1pMN2Y2gEOKhzNos3JpGq1h"}',
            'input' => '{}',
            'asform' => 's',
            'setcookie' => 'n',
            'url' => '/api/category',
            'host_id' => 1
        ]);

        DB::table('urls')->insert([
            'method' => 'get',
            'header' => '{"Accept":"application/json","Authorization":"Bearer 08oo6m3e9xhpChTgS1pMN2Y2gEOKhzNos3JpGq1h"}',
            'input' => '{}',
            'asform' => 'n',
            'setcookie' => 'n',
            'url' => '/api/category/2',
            'host_id' => 1
        ]);

        DB::table('urls')->insert([
            'method' => 'get',
            'header' => '{"Accept":"application/json","Authorization":"Bearer 08oo6m3e9xhpChTgS1pMN2Y2gEOKhzNos3JpGq1h"}',
            'input' => '{}',
            'asform' => 'n',
            'setcookie' => 'n',
            'url' => '/api/servicio',
            'host_id' => 1
        ]);

        DB::table('urls')->insert([
            'method' => 'get',
            'header' => '{"Accept":"application/json","Authorization":"Bearer 08oo6m3e9xhpChTgS1pMN2Y2gEOKhzNos3JpGq1"}',
            'input' => '{}',
            'asform' => 'n',
            'setcookie' => 'n',
            'url' => '/api/servicio',
            'host_id' => 1
        ]);


        //otro host

        DB::table('hosts')->insert([
            'host' => 'secure.visionbanco.com/oc',
            'protocolo' => 'https',
            'port' => 80,
        ]);

        DB::table('urls')->insert([
            'method' => 'get',
            'header' => '{"Accept":"application/json"}',
            'input' => '{}',
            'asform' => 's',
            'setcookie' => 's',
            'url' => '/login_mobile',
            'host_id' => 2
        ]);
    }
}
