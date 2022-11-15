<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->renameColumn('department', 'department_id');
        });
    }


    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->renameColumn('department_id', 'department');
        });
    }
};
