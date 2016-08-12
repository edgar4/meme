<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLikesColumnToMeme extends Migration
{
    public function up()
    {
        Schema::table('memes', function ($table) {
            $table->bigInteger('likes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('memes', function ($table) {
            $table->dropColumn('likes');
        });
    }
}
