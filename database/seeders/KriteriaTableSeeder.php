<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class KriteriaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('criterias')->insert([
            [
                'nama' => 'Kemampuan Komunikasi',
                'bobotkriteria' => '0.30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kemampuan Kepimimpinan',
                'bobotkriteria' => '0.35',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kreatifitas dan Inovasi',
                'bobotkriteria' => '0.20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Nilai Keaktifan',
                'bobotkriteria' => '0.15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@spk',
                'password' => Hash::make('adminspk999'),
                'created_at' => now(),
                'updated_at' => now(),
        ]);
    }
}
