<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user=Role::where('slug','administrador')->first();

        $user= new User();
    	
    		$user->name ="ITFC";
    		$user->email = "ITFC@gmail.com";
    		$user->password = bcrypt('admin123');
    		$user->save();
            $user->roles()->attach($role_user);


    }
}
