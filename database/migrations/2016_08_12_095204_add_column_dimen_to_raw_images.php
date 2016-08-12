<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDimenToRawImages extends Migration
{
    public function up()
    {
        Schema::table('raw_images', function ($table) {
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
        Schema::table('raw_images', function ($table) {
            $table->dropColumn('dimen');
        });
    }
}
