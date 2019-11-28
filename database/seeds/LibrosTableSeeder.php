<?php

use Illuminate\Database\Seeder;
use App\Libros;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Libros::class, 5)-> create();
    }
}
