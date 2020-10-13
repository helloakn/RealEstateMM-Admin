<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Notification_Detail'))
        {
            Schema::create('Notification_Detail', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('notification_id');
                $table->integer('user_id');
                $table->boolean('isSeen');
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
        Schema::dropIfExists('Notification_Detail');
    }
}
