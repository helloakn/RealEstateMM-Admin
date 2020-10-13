<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(Currency_Seeder::class);
         $this->call(Payment_TypeSeeder::class);
         $this->call(Property_Room_TypeSeeder::class);
         // $this->call(Property_TypeSeeder::class);
         $this->call(Room_TypeSeeder::class);
         $this->call(State_DivisionSeeder::class);
         $this->call(Street_TownshipSeeder::class);
         $this->call(StreetSeeder::class);
         $this->call(TownshipSeeder::class);

    }
}
