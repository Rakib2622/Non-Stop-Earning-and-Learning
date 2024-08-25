<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Link to courses
            $table->string('class_title');
            $table->string('class_url');
            $table->string('status')->default('pending'); // Initial status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }

};
