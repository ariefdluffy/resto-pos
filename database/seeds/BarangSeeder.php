<?php

use Illuminate\Database\Seeder;
use App\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang = Barang::create(['kode_barang'=>'BRG-0001',
        'nama_barang' => 'Nasi Goreng',
        'ket' => 'Menu Makanan 1',
        'harga' => '13000',
        'id_kategori' => '1',
        'id_rak' => '1',
        'id_satuan' => '1',
        'qty' => '13'
        ]);

        $barang = Barang::create(['kode_barang'=>'BRG-0002',
        'nama_barang' => 'Nasi Mawut',
        'ket' => 'Menu Makanan 2',
        'harga' => '13000',
        'id_kategori' => '1',
        'id_rak' => '1',
        'id_satuan' => '1',
        'qty' => '13'
        ]);

        $barang = Barang::create(['kode_barang'=>'BRG-0003',
        'nama_barang' => 'Nasi Sop',
        'ket' => 'Menu Makanan 3',
        'harga' => '13000',
        'id_kategori' => '1',
        'id_rak' => '1',
        'id_satuan' => '1',
        'qty' => '13'
        ]);
    }
}
