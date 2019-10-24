<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test Administrator',
            'email' => 'biblio-admin@gmail.com',
            'email_verified_at' => Carbon::now()->toDateTimeLocalString(),
            'password' => bcrypt('admin1234')
        ]);
    }
}
