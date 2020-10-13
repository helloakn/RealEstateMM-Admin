<?php

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feature = [
            [
                "name" => array(
                    'en'=>'Air conditioning',
                    'my'=>'လေအေးပေးစနစ်',
                    'ch'=>''
                )
            ],

            [
                "name" => array(
                    'en'=>'Balcony',
                    'my'=>'လသာဆောင်',
                    'ch'=>' '
                )
            ],

            [
                "name" => array(
                    'en'=>'Pool',
                    'my'=>'ရေကန်',
                    'ch'=>' '
                )
            ],

            [
                "name" => array(
                    'en'=>'Room service',
                    'my'=>'အခန်းဝန်ဆောင်မှု',
                    'ch'=>' '
                )
            ],

            [
                "name" => array(
                    'en'=>'Parking',
                    'my'=>'ကားရပ်နားရန်နေရာ',
                    'ch'=>' '
                )
            ],

            [
                "name" => array(
                    'en'=>'Security',
                    'my'=>'လုံခြုံရေး',
                    'ch'=>' '
                )
            ]

        ];
        foreach ($feature as $value) {
            $name = json_encode($value['name']);
            // echo $name;exit;
            $feature = Feature::where('name','=',$name)->first();
            if(!$feature){
                $feature = new Feature();
                $feature->name = $name ;
                $feature->save();
            }
            else{
                echo "already existed\n";
            }

        }
    }
}
