<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = Kategori::create(['nama_kategori'=>'Makanan Goreng']);
        $kategori = Kategori::create(['nama_kategori'=>'Makanan Kuah']);
        $kategori = Kategori::create(['nama_kategori'=>'Makanan Dingin']);
        $kategori = Kategori::create(['nama_kategori'=>'Makanan Panas']);
    }
}
