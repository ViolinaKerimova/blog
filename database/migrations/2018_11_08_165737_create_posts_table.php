<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *promqna na structuratana bazata
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title',255);
            $table->text('body');
            $table->unsignedInteger('users_id')->length(10); //imeto na ablicata i imeto na primary key unsigned int daljina 10
            $table->timestamps();
            
            $table->foreign('users_id' )
                   ->references('id') 
                    ->on('users')
                    ->onDelete('CASCADE'); //glavni bukvi
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
