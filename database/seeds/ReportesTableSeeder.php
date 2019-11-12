<?php

use Illuminate\Database\Seeder;
use App\Reportes;
class ReportesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reportes::class,5)->create();
    }
}
