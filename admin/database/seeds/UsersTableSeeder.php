<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Model::unguard();
        //$this->call(UsersTableSeeder::class);

        $user  = 
        User::create(['name'=>'admin' ,
         'email' => 'admin@admin.com' , 
         'password'=>bcrypt('password')]);


        
         Model::reguard(); 
    }
}
