<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('parent_id')->unsigned();
            $table->bigInteger('child_id')->unsigned();
            $table->timestamps();
    
            // Indexes
            $table->index('created_by');
            $table->index('parent_id');
            $table->index('child_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
