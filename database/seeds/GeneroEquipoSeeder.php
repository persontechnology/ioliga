<?php

use Illuminate\Database\Seeder;
use ioliga\Models\Equipo\GeneroEquipo;
class GeneroEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g_masculino=GeneroEquipo::updateOrCreate(['nombre' => 'Masculino']);
         $g_femenino=GeneroEquipo::updateOrCreate(['nombre' => 'Femenino']);
    }
}
