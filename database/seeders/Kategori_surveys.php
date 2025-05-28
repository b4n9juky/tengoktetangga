<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriSurvey;

class Kategori_surveys extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriSurvey::create([
            'nama_kategori' => 'Tengok Tetangga',
            'deskripsi' => 'Pertanyaan seputar kondisi lingkungan sosial tempat tinggal.'
        ]);

        KategoriSurvey::create([
            'nama_kategori' => 'Kegiatan Ekstrakurikuler',
            'deskripsi' => 'Survey terkait kegiatan non-akademik.'
        ]);
    }
}
