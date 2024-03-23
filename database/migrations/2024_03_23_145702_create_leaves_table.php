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
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('staff_id')->nullable(false);
            $table->string('type_of_leave')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('date_of_leave')->nullable(false);
            $table->string('end_of_leave')->nullable(false);
            $table->string('approval_status')->nullable(false);
            $table->timestamps(); // This creates `created_at` and `updated_at` columns
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
};
