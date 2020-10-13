<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Search_Filter'))
        {
            if (!Schema::hasTable('Search_Filter')) {
                Schema::create('Search_Filter', function (Blueprint $table) {
                    $table->id();
                    $table->timestamps();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Search_Filter');
    }
}
