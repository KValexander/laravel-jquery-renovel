<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovelModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novels', function (Blueprint $table) {
            $table->increments("novel_id");
            $table->foreignId("user_id");
            $table->foreignId("developer_id");
            $table->foreignId("publisher_id");
            // Изображение новеллы (таблица изображений)
            // Изображение на фон (таблица изображений)
            $table->string("title", 100);
            $table->string("original_title", 200)->nullable();
            $table->string("alternative_title", 200)->nullable();
            $table->year("year_release");
            // $table->date("date_release")->nullable();
            $table->text("description");
            $table->foreignId("d_type_id");
            $table->foreignId("d_duration_id");
            $table->foreignId("d_platform_id");
            $table->string("age_rating", 5);
            $table->foreignId("d_country_id");
            $table->foreignId("d_language_id");
            // Жанры (таблица жанров)
            // Теги (таблица тегов)
            $table->tinyinteger("status")->default("0");
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
        Schema::dropIfExists('novels');
    }
}
