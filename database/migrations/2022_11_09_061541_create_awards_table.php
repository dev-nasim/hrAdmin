<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->string('awd_name');
            $table->string('awd_des');
            $table->string('emp_name');
            $table->string('awd_item');
            $table->string('awd_date');
            $table->string('awd_by');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('awards');
    }
};
