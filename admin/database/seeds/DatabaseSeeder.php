<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
