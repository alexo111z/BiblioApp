<?php

use Illuminate\Database\Seeder;
use App\Autores;
class AutoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Autores::class,150)->create();
    }
}
