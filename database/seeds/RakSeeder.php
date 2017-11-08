<?php

use Illuminate\Database\Seeder;
use App\Rak;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rak = Rak::create(['nama_rak'=>'Biasa']);
        $rak = Rak::create(['nama_rak'=>'Spesial']);
    }
}
