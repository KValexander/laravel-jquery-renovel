<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentRatingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_ratings', function (Blueprint $table) {
            $table->increments("comment_rating_id");
            $table->foreignId("user_id");
            $table->foreignId("comment_id");
            $table->integer("like");
            $table->integer("unlike");
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
        Schema::dropIfExists('comment_ratings');
    }
}
