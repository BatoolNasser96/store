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
        $size1= new \App\Size();
        $size1->name = 's';
        $size1->save();
    }
}
