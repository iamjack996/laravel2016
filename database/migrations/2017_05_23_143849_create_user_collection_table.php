<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_collection', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->integer('company_id')->unsigned();
          $table->integer('article_id')->unsigned();
          $table->string('article_title')->nullable();
          $table->string('article_type')->nullable();
          $table->string('article_company')->nullable();
          $table->string('article_location')->nullable();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('company_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('article_id')->references('id')->on('article')->onDelete('cascade');
          $table->rememberToken();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_collection');
    }
}
