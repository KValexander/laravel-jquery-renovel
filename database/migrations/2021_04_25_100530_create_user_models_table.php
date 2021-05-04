<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("user_id");
            $table->string("username", 30);
            $table->string("email", 50);
            $table->string("login", 30);
            $table->string("password", 100);
            $table->string("remember_token", 100)->nullable();
            $table->foreignId("d_role_id");
            // Изображение аватара пользователя (таблица изображений)
            $table->string("user_status", 100)->nullable();
            $table->string("about", 500)->nullable();
            // Изображение заднего фона пользователя (таблица изображений)
            $table->tinyinteger("online")->default("0");
            $table->tinyinteger("status")->default("0");
            $table->tinyinteger("ban")->default("0");
            $table->tinyinteger("delete_marker")->default("0");
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
        Schema::dropIfExists('users');
    }
}
