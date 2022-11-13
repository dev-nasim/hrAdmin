<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('awards', function (Blueprint $table) {
            $table->renameColumn('emp_name', 'employee_id');
        });
    }


    public function down()
    {
        Schema::table('awards', function (Blueprint $table) {
            $table->renameColumn('employee_id', 'emp_name');
        });
    }
};
