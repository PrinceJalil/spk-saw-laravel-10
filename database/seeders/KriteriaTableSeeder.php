<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
    }
}
