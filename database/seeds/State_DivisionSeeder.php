<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\State_Division;

class State_DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state_division = [
            [
                "name" => array(

                'en'=>'Yangon Region',
                'my'=>'ရန်ကုန်တိုင်းဒေသကြီး',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Mandalay Region',
                'my'=>'မန္တလေးတိုင်းဒေသကြီး',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'NayPyiTaw Region',
                'my'=>'နေပြည်တော်တိုင်းဒေသကြီး',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Tanintharyi Region',
                'my'=>'တနင်္သာရီတိုင်းဒေသကြီး',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Kachin State',
                'my'=>'ကချင်ပြည်နယ်',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Kayah State',
                'my'=>'ကယားပြည်နယ်',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Chin State',
                'my'=>'ချင်းပြည်နယ်',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Rakhine State',
                'my'=>'ရခိုင်ပြည်နယ်',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Mon State',
                'my'=>'မွန်ပြည်နယ်',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Karen State',
                'my'=>'ကရင်ပြည်နယ်',
                'ch'=>''
                )
            ],

            [
                "name" => array(
                'en'=>'Sagaing Region',
                'my'=>'စစ်ကိုင်းတိုင်းဒေသကြီး',
                'ch'=>''
                )
            ],
            [
                "name" => array(
                'en'=>'AyeYarWaddy Region',
                'my'=>'ရာဝတီတိုင်းဒေသကြီး',
                'ch'=>''
                )
            ],
            [
                "name" => array(
                'en'=>'Bago Region',
                'my'=>'ပဲခူးတိုင်းဒေသကြီး',
                'ch'=>''
                )
            ],
            [
                "name" => array(
                'en'=>'Magway Region',
                'my'=>'မကွေးတိုင်းဒေသကြီး',
                'ch'=>''
                )
            ],
            [
                "name" => array(
                'en'=>'Shan State',
                'my'=>'ရှမ်းပြည်နယ်',
                'ch'=>''
                )
            ]
        ];
        foreach ($state_division as $value) {
            $name = json_encode($value['name']);

            $state_division = State_Division::where('name','=',$name)->first();
            if(!$state_division){
                $state_division = new State_Division();
                $state_division->name = $name ;
                $state_division->save();
            }
            else{
                echo " already existed\n";
            }

        }
    }
}
