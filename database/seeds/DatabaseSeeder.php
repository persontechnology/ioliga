<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RolesYusuariosSeeder::class);
    	$this->call(PermisosSeeder::class);
        $this->call(GeneroEquipoSeeder::class);
        $this->call(SeriesSeed::class);
        
    }
}
