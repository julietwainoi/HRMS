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
          
        $table->increments('auto_id')->nullable(false);
        $table->string('staff_id')->unique();
        $table->string('type_of_leave')->nullable(false);
        $table->string('description',4000)->nullable(false);
        $table->date('date_of_leave')->nullable(false);
        $table->date('end_of_leave')->nullable(false);
        $table->datetime('date_of_request')->nullable(false);
        $table->string('approval_status')->nullable(false);

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
