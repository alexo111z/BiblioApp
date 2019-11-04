<?php

use Illuminate\Database\Seeder;
use App\Editoriales;
class EditorialesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Editoriales::class,150)->create();
    }
}
