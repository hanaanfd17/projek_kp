<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodysAndKonstantasSeeder extends Seeder
{
    public function run()
    {
        // Insert data untuk tabel `bodys1s`
        DB::table('bodys1s')->insert([
            ['menu' => 'kelompok', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'no PH', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'kebun', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'kecamatan', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'no.induk', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'kabupaten', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'no. fak', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'luas areal', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'kategori', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'periode', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert data untuk tabel `bodys2s`
        DB::table('bodys2s')->insert([
            ['menu' => 'tebu digiling', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'rendemen', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'rendemen petani', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'gula bagian petani', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'rend s/d 6%', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'rend selebihnya', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'gula petani 90%', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'gula petani 10%', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'tetes petani', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert data untuk tabel `bodys3s`
        DB::table('bodys3s')->insert([
            ['menu' => 'nilai gula petani', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'nilai tetes petani', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert data untuk tabel `bodys4s`
        DB::table('bodys4s')->insert([
            ['menu' => 'biaya upah terbang', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'biaya angkut truk 1', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'biaya angkut truk 2', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'biaya eksplo tetes', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'biaya RDKK', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'beban lintingan', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'penggantian zak 90%', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'penggantian zak 10%', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'iuran APTRI', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'pinjaman(garapan,dll)', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'biaya bunga pinjaman', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'biaya bunga teb & ang', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'pinjaman KPTR', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'pinjaman lain2', 'created_at' => now(), 'updated_at' => now()],
            ['menu' => 'biaya umbal crane', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert data untuk tabel `konstantas`
        DB::table('konstantas')->insert([
            [
                'nilaiGula' => 1052500,
                'nilaiTetes' => 1400,
                'biayaUpah' => 0,
                'angkutTruk' => 3975,
                'biayaEksplo' => 10,
                'biayaRDKK' => 0,
                'biayaLinting' => 170,
                'biaaZAK' => 8030,
                'iuranAPTRI' => 20,
                'biayaCrane' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}