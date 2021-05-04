<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments("image_id");
            $table->foreignId("foreign_id");
            $table->string("path_to_image", 100);
            $table->string("image_name", 100)->nullable();
            $table->string("image_size", 100)->nullable();
            $table->string("image_execute", 10)->nullable();
            $table->string("table", 30);
            $table->string("type", 30);
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
        Schema::dropIfExists('images');
    }
}
