<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Street;
use App\Models\Township;

use App\Models\Street_Township;

class Street_TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        /**/
        $data = [
            ['str'=>array(

                'en'=>'Khaing Shwe War Street',
                'my'=>'ခိုင်ရွှေဝါလမ်း',
                'ch'=>'钦瑞战争街'
            ),
                'tws'=>array(

                    'en'=>'Hlaing',
                    'my'=>'လှိုင်',
                    'ch'=>'la'
                )
            ],

            ['str'=>array(

                'en'=>'51 Street',
                'my'=>'၅၁ လမ်း',
                'ch'=>'51街'
            ),
                'tws'=>array(

                    'en'=>'Botataung',
                    'my'=>'ဗိုလ်တထောင်',
                    'ch'=>'博当 '
                )
            ],

            ['str'=>array(

                'en'=>'52 Street',
                'my'=>'၅၂ လမ်း',
                'ch'=>'52街'
            ),
                'tws'=>array(

                    'en'=>'Botataung',
                    'my'=>'ဗိုလ်တထောင်',
                    'ch'=>'博当'
                )
            ],

            ['str'=>array(

                'en'=>'Anawrahta Road',
                'my'=>'အနော်ရထာလမ်း',
                'ch'=>'Anawrahta路'
            ),
                'tws'=>array(

                    'en'=>'Kyauktawar Township',
                    'my'=>'ကျောက်တံတားမြို့နယ်',
                    'ch'=>'Kyauktawar乡镇'
                )
            ],

            ['str'=>array(

                'en'=>'Anawrahta Road',
                'my'=>'အနော်ရထာလမ်း',
                'ch'=>'Anawrahta路'
            ),
                'tws'=>array(

                    'en'=>'Lathar Township',
                    'my'=>'လသာမြို့နယ်',
                    'ch'=>'拉萨镇'
                )
            ]


        ];

        foreach ($data as $key => $value) {

            $street_id = $this->InsertStreet(json_encode($value['str']));
            $township_id = $this->InsertTownship(json_encode($value['tws']));
            $this->InsertStreetTownship($street_id,$township_id);
            //echo $street_id;
        }
    }

    public function InsertStreet($streetName){
        //echo $streetName."\n";
        $street = Street::where('name',$streetName)->first();
        if($street){
            return $street->id;
        }
        else{
            $street = new Street();
            $street->name = $streetName;
            $street->save();
            return $street->id;
        }

    }

    public function InsertTownship($townshipName){
        //echo $streetName."\n";
        $township = Township::where('name',$townshipName)->first();
        if($township){
            return $township->id;
        }
        else{
            $township = new Township();
            $township->name = $townshipName;
            $township->state_division_id = 1;
            $township->lat = 10;
            $township->lag = 10;
            $township->save();
            return $township->id;
        }

    }

    public function InsertStreetTownship($street_id,$township_id){
        //echo $streetName."\n";
        $street_township = Street_Township::where('street_id',$street_id)
            ->where('township_id',$township_id)->first();
        if($street_township){
            return $street_township->id;
        }
        else{
            $street_township = new Street_Township();
            $street_township->street_id = $street_id;
            $street_township->township_id = $township_id;
            $street_township->save();
        }

    }
}
