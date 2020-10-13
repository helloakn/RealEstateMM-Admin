<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Admin'))
        {
            Schema::create('Admin', function (Blueprint $table) {
                $table->id();
                $table->smallInteger('type');
                $table->string('name', 250);
                $table->string('profile_image', 100);
                $table->string('email', 250)->unique();
                $table->text('password');
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
        Schema::dropIfExists('Admin');
    }
}
