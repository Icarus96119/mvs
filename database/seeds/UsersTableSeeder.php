<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Patrick Dierig',
            'email' => 'patrick.dierig@mkhyp.de',
            'password' => bcrypt('ostwall211'),
        ]);
    
    }
}
