<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\User;

class UserSeeder extends Seeder
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
                'name'=>'user',
                'profile_image'=> '',
                'email'=> 'user@localhost.com',
                'password' => Hash::make("123456789"),
                'activation_code' => Hash::make("0"),
                'isPremiumUser' => 1
            ]
        ];


        foreach ($data as $key => $value) {
            $s = User::where('name','=',$value['name'])
                ->where('profile_image','=',$value['profile_image'])
                ->where('email','=',$value['email'])
                ->first();

            if(!$s){
                $s = new User();
                $s->name = $value['name'];
                $s->profile_image = $value['profile_image'];
                $s->email = $value['email'];
                $s->password = $value['password'];
                $s->activation_code = $value['activation_code'];
                $s->isPremiumUser = $value['isPremiumUser'];
                $s->save();
            }
            else{
                echo " already existed\n";
            }

        }


    }
}
