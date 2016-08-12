<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDimenToRawImages extends Migration
{
    public function up()
    {
        Schema::table('memes', function ($table) {
            $table->string('dimen');
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
            $table->dropColumn('dimen');
        });
    }
}
