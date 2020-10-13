<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency_type = [
            [
                "name" => array(
                    "en" => "Kyat",
                    "my" => "ကျပ်",
                    "ch" => "缅元"
                ),

                "unit" => array(
                    "en" => "MMK",
                    "my" => "MMK",
                    "ch" => "MMK"
                )

            ],

            [
                "name" => array(
                    "en" => "USA",
                    "my" => "ဒေါ်လာ",
                    "ch" => "美国"
                ),
                "unit" => array(
                    "en" => "$",
                    "my" => "$",
                    "ch" => "$"
                )
            ],

            ["name" => array(
                "en" => "Yuan",
                "my" => "ယွမ်",
                "ch" => "元"),
                "unit" => array(
                    "en" => "¥",
                    "my" => "¥",
                    "ch" => "¥")
            ]
        ];

//r_dump($currency_type );
        //   exit();
        foreach ($currency_type as $key => $value) {
            $name = json_encode($value['name']);
            $unit = json_encode($value['unit']);
            //var_dump($name);
            //  exit();
            $currency_type = Currency::where('name','=',$name)
                ->where('unit','=',$unit)->first();

            if(!$currency_type){

                $data = new Currency();
                $data->name =$name;
                $data->unit = $unit;
                $data->save();
            }
            else{
                echo " already existed\n";
            }
        }
    }
}
