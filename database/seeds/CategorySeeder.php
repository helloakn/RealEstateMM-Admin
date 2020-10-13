<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryArray = [
            [
                "name" => array(
                'en'=>'House',
                'my'=>'လုံးချင်းအိမ်',
                'ch'=>'屋'
                )
            ],

            [
                "name" => array(
                'en'=>'Condo',
                'my'=>'ကွန်ဒိုအခန်း',
                'ch'=>'公寓'
                )
            ],

            [
                "name" => array(
                'en'=>'Townhouse',
                'my'=>'မြို့တွင်းအိမ်',
                'ch'=>'联排别墅'
                )
            ],

            [
                "name" => array(
                'en'=>'Apartment',
                'my'=>'တိုက်ခန်း',
                'ch'=>'公寓式'
                )
            ],

            [
                "name" => array(
                'en'=>'Serviced Apartment',
                'my'=>'ဝန်ဆောင်မှုပေးသောတိုက်ခန်း',
                'ch'=>'服务式公寓'
                )
            ],

            [
                "name" => array(
                'en'=>'Hostel',
                'my'=>'ဘော်ဒါဆောင်',
                'ch'=>'旅馆'
                )
            ],

            [
                "name" => array(
                'en'=>'Hotel/Report',
                'my'=>'ဟိုတယ်',
                'ch'=>'酒店/报告'
                )
            ],

            [
                "name" => array(
                'en'=>'Land',
                'my'=>'မြေ',
                'ch'=>'土地'
                )
            ],

            [
                "name" => array(
                'en'=>'Office/Commercial Building',
                'my'=>'ရုံးအဆောက်အအုံ',
                'ch'=>'办公室/商业大厦'
                )
            ],

            [
                "name" => array(
                'en'=>'Shophouse',
                'my'=>'ဆိုင်ခန်း',
                'ch'=>'店屋'
                )
            ],

            [
                "name" => array(
                'en'=>'Warehouse/Factory',
                'my'=>'ဂိုဒေါင် / စက်ရုံ',
                'ch'=>'仓库/工厂'
                )
            ]
        ];
        foreach ($categoryArray as $value) {
            $name = json_encode($value['name']);

            $category = Category::where('name','=',$name)->first();
            if(!$category){
                $category = new Category();
                $category->name = $name ;
                $category->save();
            }
            else{
                echo " already existed\n";
            }

        }

    }
}
