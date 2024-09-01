<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('networks', function (Blueprint $table) {
        $table->boolean('bonus_applied')->default(false);
    });
}

public function down()
{
    Schema::table('networks', function (Blueprint $table) {
        $table->dropColumn('bonus_applied');
    });
}

};
