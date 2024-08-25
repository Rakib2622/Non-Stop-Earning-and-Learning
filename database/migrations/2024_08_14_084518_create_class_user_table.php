<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassUserTable extends Migration
{
    public function up()
    {
        Schema::create('class_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('class_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending'); // Track class status for each user
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_user');
    }
};
