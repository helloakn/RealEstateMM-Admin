<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('Share_Tracking')) {
            Schema::create('Share_Tracking', function (Blueprint $table) {
                $table->id();
                $table->binary('type');
                $table->integer('type_id');
                $table->integer('user_id');
                $table->dateTime('access_datetime', 0);
                $table->text('url');
                $table->text('channel');
                $table->timestamps();
                $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('Share_Tracking');
    }
}
