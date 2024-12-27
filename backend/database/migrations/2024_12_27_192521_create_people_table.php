<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('created_by')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birth_name')->nullable();
            $table->string('middle_names')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}