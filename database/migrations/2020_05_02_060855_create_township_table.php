<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTownshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Township'))
        {
            Schema::create('Township', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('state_division_id');
                $table->string('name',250);
                $table->decimal('lat',10,7);
                $table->decimal('lag',10,7);
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
        Schema::dropIfExists('Township');
    }
}
