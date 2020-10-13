<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Property_Room_Type'))
        {
            Schema::create('Property_Room_Type', function (Blueprint $table) {
                $table->id();
                $table->integer('room_id');
                $table->integer('property_id');
                $table->integer('count');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Property_Room_Type');
    }
}
