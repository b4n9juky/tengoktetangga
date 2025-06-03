<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KondisiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Lansia Tinggal Sendiri'],
            ['nama' => 'Sakit / Berpenyakit menahun'],
            ['nama' => 'Memiliki anggota keluarga dengan kondisi disabilitas'],
            ['nama' => 'Memiliki anggota keluarga yang berpenyakit kronis'],
            ['nama' => 'Memiliki anggota keluarga dengan gangguan jiwa'],
        ];

        DB::table('kondisis')->insert($data);
    }
}
