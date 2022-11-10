<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->string('h_name');
            $table->string('from');
            $table->string('to');
            $table->string('no_days');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('holidays');
    }
};
