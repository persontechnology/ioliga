<?php

use Illuminate\Database\Seeder;
use ioliga\Models\Campeonato\Serie;
class SeriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $s_a=Serie::updateOrCreate(['nombre' => 'A']);
         $s_b=Serie::updateOrCreate(['nombre' => 'B']);
         $s_c=Serie::updateOrCreate(['nombre' => 'C']);
         $s_d=Serie::updateOrCreate(['nombre' => 'D']);
    }
}
