<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Chat_Detail'))
        {
            Schema::create('Chat_Detail', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->integer('property_owner_agent_id');
                $table->integer('admin_id');
                $table->text('message');
                $table->dateTime('deleted_at');
                $table->integer('chat_id');
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
        Schema::dropIfExists('Chat_Detail');
    }
}
