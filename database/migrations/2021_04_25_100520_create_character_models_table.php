<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments("characters");
            $table->foreignId("user_id");
            $table->foreignId("novel_id");
            // Изображение персонажа (таблица изображений)
            $table->string("name", 30);
            $table->string("original_name", 30)->nullable();
            $table->string("role_in_story", 10);
            $table->string("gender", 10);
            $table->text("description");
            $table->tinyinteger("status")->default("1");
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
        Schema::dropIfExists('characters');
    }
}
