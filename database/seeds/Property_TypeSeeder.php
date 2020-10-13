<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Property_Type;

class Property_TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $property_type = [
            [
                "name" => array(

                'en'=>'Sale',
                'my'=>'ရောင်းရန်',
                'ch'=>'销售'
                )
            ],

            [
                "name" => array(
                'en'=>'Rent',
                'my'=>'ငှားရန်',
                'ch'=>'出租'
                )
            ],


        ];
        foreach ($property_type as $value) {
            $name = json_encode($value['name']);

            $property_type = Property_Type::where('name','=',$name)->first();
            if(!$property_type){
                $property_type = new Property_Type();
                $property_type->name = $name ;
                $property_type->save();
            }
            else{
                echo " already existed\n";
            }

        }

    }
}
