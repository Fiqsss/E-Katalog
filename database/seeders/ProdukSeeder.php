<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            'namabarang' => 'FAWR FZ RF-GPS/GLONASS Indoor',
            'matcode' => 'FAWR GPS',
            'kategori' => 'ANTENA',
            'gambar' => 'image1.jpeg',
            'tanggal' => '2023-08-01'
        ]);
        DB::table('produks')->insert([
            'namabarang' => 'antena GPS anti jam super anti petir',
            'matcode' => '50531800083Z',
            'kategori' => 'ANTENA',
            'gambar' => 'image2.jpeg',
            'tanggal' => '2023-08-01'
        ]);
        DB::table('produks')->insert([
            'namabarang' => 'Kabel power 4×16 Bongkar',
            'matcode' => 'CBLPOWER 4X16',
            'kategori' => 'ANTENA',
            'gambar' => 'image3.jpeg',
            'tanggal' => '2023-08-01'
        ]);
        DB::table('produks')->insert([
            'namabarang' => 'Antena Rosenberger 10 port',
            'matcode' => 'BA-B74Q7X90V-00',
            'kategori' => 'ANTENA',
            'gambar' => 'image4.jpeg',
            'tanggal' => '2023-08-01'
        ]);
    }
}