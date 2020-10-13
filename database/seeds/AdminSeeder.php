<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        
    	// $admin->type = "0"
     //    $admin->name = "Admin";
     //    $admin->email = "admin@localhost.com";
     //    $admin->password = Hash::make("123456789");
        // $admin->token = GeneralFunction::generateRandomString(200);
        // $admin->image = "https://gravatar.com/avatar/".md5($admin->email);

        $data = [
	        	[
	        		'type'=>1,
	        		'name'=>'Admin',
	        		'profile_image'=> '',
	        		'email'=> 'admin@localhost.com',
	        		'password' => Hash::make("123456789")
	        	]
	        ];
    
        	
        foreach ($data as $key => $value) {
//print_r($value['name']);exit;
            $admin = Admin::where('type','=',$value['type'])
            		->where('name','=',$value['name'])
            		->where('profile_image','=',$value['profile_image'])
            		->where('email','=',$value['email'])
            		->first();

            if(!$admin){                            
                $admin = new Admin();
                $admin->type = $value['type'];
                $admin->name = $value['name'];
                $admin->profile_image = $value['profile_image'];
                $admin->email = $value['email'];
                $admin->password = $value['password'];
                $admin->save();
            }
            else{
                echo " already existed\n";
            }

    	}


    }
}
