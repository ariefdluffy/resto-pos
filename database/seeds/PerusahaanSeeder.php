<?php

use Illuminate\Database\Seeder;
use App\Perusahaan;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample Perusahaan
        $perusahaan1 = Perusahaan::create(['nama_perusahaan'=>'PT. SKL',
        'alamat_perusahaan'=>'Jl. SP3',
        'no_tlp'=>'08110009991',
        'jenis_perusahaan'=>'Pertambangan']
        );
        $perusahaan1 = Perusahaan::create(['nama_perusahaan'=>'PT. Kaleda',
        'alamat_perusahaan'=>'Jl. SP2',
        'no_tlp'=>'08110009992',
        'jenis_perusahaan'=>'Perkayuan']
        );
        $perusahaan1 = Perusahaan::create(['nama_perusahaan'=>'PT. KPC',
        'alamat_perusahaan'=>'Jl. SP1',
        'no_tlp'=>'08110009993',
        'jenis_perusahaan'=>'Perkebunan']
        );
        $perusahaan1 = Perusahaan::create(['nama_perusahaan'=>'PT. Kembar SIAM',
        'alamat_perusahaan'=>'Jl. Mayjen Sutoyo',
        'no_tlp'=>'08110009993',
        'jenis_perusahaan'=>'Perkebunan']
        );
    }
}
