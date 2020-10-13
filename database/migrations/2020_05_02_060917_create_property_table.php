<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Property'))
        {
            Schema::create('Property', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('location_id');
                $table->integer('property_type');
                $table->integer('category_id');
                $table->integer('owner_type');
                $table->integer('user_id');
                $table->text('address');
                $table->integer('finished_type');
                $table->integer('finished_percentage');
                $table->text('size');
                $table->decimal('price');
                $table->integer('currency_id');
                $table->integer('payment_type_id');
                $table->binary('advertiser');
                $table->text('remark');
                $table->binary('status');
                $table->integer('deleted_by');
                $table->binary('deleted_by_type');
                $table->integer('created_by');
                $table->text('floor');
                $table->binary('location_type');
                $table->unsignedDecimal('lat',16,8);
                $table->unsignedDecimal('lng',16,8);//
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
        Schema::dropIfExists('Property');
    }
}
