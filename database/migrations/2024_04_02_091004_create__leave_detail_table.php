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
        Schema::create('LeaveDetail', function (Blueprint $table) {
            $table->id();
     
            $table->string('EmployeeID')->nullable(false);
            $table->string('LeaveCode')->nullable(false);
            $table->string('LeaveDesc')->nullable(false);
            $table->string('LeaveDays')->nullable(false);
             $table->string('RemainingDays')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LeaveDetail');
    }
};
