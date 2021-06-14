<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLikesRetweetsSoftdeletesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropColumns('likes', ['deleted_at']);
        Schema::dropColumns('retweets', ['deleted_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('retweets', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
}
