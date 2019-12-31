<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $admin1= \App\Admin::create([
            'name' =>'Batool',
            'username' =>'batool',
            'email' =>'batool@gmail.com',
            'password' =>Hash::make('123456789'),
            'img' => 'images/8koDGZeys56R5jHMtGGMAmTn8xQ5a8GZpyoJv7fu.jpeg'
            ]);
         
    }
}
