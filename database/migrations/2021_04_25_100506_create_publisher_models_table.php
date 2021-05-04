<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublisherModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->increments("publisher_id");
            $table->foreignId("user_id");
            // Изображение логотипа разработчика (таблица изображений)
            $table->string("title", 100);
            $table->year("year_foundation");
            $table->text("description");
            $table->foreignId("d_country_id");
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
        Schema::dropIfExists('publishers');
    }
}
