<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Favourite'))
        {
            Schema::create('Favourite', function (Blueprint $table) {
                $table->id();
                $table->integer('property_id');
                $table->integer('user_id');
                $table->dateTime('deleted_at');
                $table->integer('status');
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
        Schema::dropIfExists('Favourite');
    }
}
