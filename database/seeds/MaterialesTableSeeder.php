<?php

use Illuminate\Database\Seeder;
use App\Materiales;

class MaterialesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Materiales::class, 80)-> create();
    }
}
