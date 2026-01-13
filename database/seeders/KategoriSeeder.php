<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Kategori::insert([
        ['nama_kategori' => 'Kaos'],
        ['nama_kategori' => 'Kemeja'],
        ['nama_kategori' => 'Jaket'],
        ['nama_kategori' => 'Celana'],
    ]);
    }
}
