<?php

use App\Carrera;
use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Carrera::class)->create([
            'Nombre' => 'ITICS',
            'Existe' => 0,
        ]);
        factory(Carrera::class)->create([
            'Nombre' => 'ISC',
        ]);
        factory(Carrera::class)->times(10)->create();
    }
}
