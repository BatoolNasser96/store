<?php

use Illuminate\Database\Seeder;

class PermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $Perm1= \App\Perm::create([
            'id' =>'1',
            'name' =>'admin.admins',
        ]);
         $Perm2= \App\Perm::create([
            'id' =>'2',
            'name' =>'admin.admins.delete',
        ]);
         $Perm3= \App\Perm::create([
            'id' =>'3',
            'name' =>'admin.admins.edit',
        ]);
         $Perm4= \App\Perm::create([
            'id' =>'4',
            'name' =>'admin.admins.create',
        ]);
       
   
    }
}
