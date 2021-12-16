<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFitTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fit_tag', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('updated_at');
            $table->dropColumn('created_at');
            $table->integer('tag_id');
            $table->integer('fit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table > dropColumn('fit_id');
        $table->dropColumn('tag_id');
        $table->id();
        $table->timestamps();
    }
}
