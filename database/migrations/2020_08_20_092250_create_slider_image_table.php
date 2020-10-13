<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(!Schema::hasTable('Slider_Image'))
       {
           Schema::create('Slider_Image', function (Blueprint $table) {
               $table->id();
               $table->text('image');
               $table->text('small_image');
               $table->integer('property_id');
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
        Schema::dropIfExists('Slider_Image');
    }
}
