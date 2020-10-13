<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Payment_Type;

class Payment_TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
    	// $data = [
     //    	['name'=>'Installment',
     //    	'description'=>'KBZ , AYA, CB, ABank, Cash on paid'
     //    ],
     //    	['name'=>'Pay in full',
     //    	'description'=>'KBZ , AYA, CB, ABank, Cash on paid'
     //    ]
     //    ];
     //    foreach ($data as $key => $value) {

     //        $payment_type = Payment_Type::where('name','=',$value['name'])
     //        ->where('description','=',$value['description'])->first();
     //        if(!$payment_type){                            
     //            $payment_type = new Payment_Type();
     //            $payment_type->name = $value['name'];
     //            $payment_type->description = $value['description'];
     //            $payment_type->save();
     //        }
     //        else{
     //            echo $value['name']." already existed\n";
     //        }

    	// }

        $payment_type = [
            [
                "name" => array(
                    "en" => "Installment",
                    "my" => "အရစ်ကျ",
                    "ch" => "分期付款"
                ),

                "description" => array(
                    "en" => "KBZ , AYA, CB, ABank, Cash on paid",
                    "my" => "KBZ, AYA, CB, ABank၊ ငွေသားဖြင့်ငွေပေးချေခြင်း",
                    "ch" => "KBZ, AYA, CB, ABank၊ ငွေသားဖြင့်ငွေပေးချေခြင်း"
                )

            ],

            [
                "name" => array(
                    "en" => "Mass payment",
                    "my" => "အလုံးအရင်း ပေးဆောင်",
                    "ch" => "批量付款"
                ),
                "description" => array(
                    "en" => "KBZ , AYA, CB, ABank, Cash on paid",
                    "my" => "KBZ , AYA, CB, ABank, Cash on paid",
                    "ch" => "KBZ , AYA, CB, ABank, Cash on paid"
                )
            ]

           
        ];

//r_dump($currency_type );
   //   exit();
        foreach ($payment_type as $key => $value) {
             $name = json_encode($value['name']);
             $description = json_encode($value['description']);
             //var_dump($name);
           //  exit();
            $payment_type = Payment_Type::where('name','=',$name)
            ->where('description','=',$description)->first();

            if(!$payment_type){   

            $data = new Payment_Type();
            $data->name =$name;
            $data->description = $description;
            $data->save();
            }
            else{
                 echo " already existed\n";
            }
        }
        




    	
	}
}
