<?php

use Illuminate\Database\Seeder;

class AdminPermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {
        //
         $AdminPerm1= \App\AdminPerm::create([
            'id' =>'1',
            'admin_id' =>'1',
            'perm' =>'admin.admins',
        ]);
         $AdminPerm2= \App\AdminPerm::create([
            'id' =>'2',
            'admin_id' =>'1',
            'perm' =>'admin.admins.delete',
        ]);
         $AdminPerm3= \App\AdminPerm::create([
            'id' =>'3',
            'admin_id' =>'1',
            'perm' =>'admin.admins.edit',
        ]);
         $AdminPerm4= \App\AdminPerm::create([
            'id' =>'4',
            'admin_id' =>'1',
            'perm' =>'admin.admins.create',
        ]);
       
   
    }
}
