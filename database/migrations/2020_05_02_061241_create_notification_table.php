<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Notification'))
        {
            Schema::create('Notification', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->smallInteger('type');
                $table->integer('type_id');
                $table->text('description');
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
        Schema::dropIfExists('Notification');
    }
}
