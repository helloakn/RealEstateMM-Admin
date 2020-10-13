<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Room_Type;

class Room_TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_type = [
            [
                "name" => array(
            
                'en'=>'Bath room',
                'my'=>'ရေချိုးခန်း',
                'ch'=>'浴室'
                )
            ],

            [
                "name" => array(
                'en'=>'Master room',
                'my'=>'မာစတာခန်း',
                'ch'=>'主人房'
                )
            ],

            [
                "name" => array(
                'en'=>'Kitchen room',
                'my'=>'မီးဖိုချောင်ခန်း',
                'ch'=>'厨房室'
                )
            ],

            [
                "name" => array(
                'en'=>'Sleeping room',
                'my'=>'အိပ်ခန်း',
                'ch'=>'卧室'
                )
            ],

            [
                "name" => array(
                'en'=>'Toilet',
                'my'=>'အိမ်သာ',
                'ch'=>'厕所'
                )
            ]
        ];
        foreach ($room_type as $value) {
            $name = json_encode($value['name']);
           
            $room_type = Room_Type::where('name','=',$name)->first();
            if(!$room_type){
                $room_type = new Room_Type();
                $room_type->name = $name ;
                $room_type->save();
            }
            else{
                echo "already existed\n";
            }
            
        }
    }
}
