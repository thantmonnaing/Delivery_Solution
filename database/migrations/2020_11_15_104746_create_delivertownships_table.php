<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelivertownshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivertownships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deliver_id');
            $table->foreign('deliver_id')
                  ->references('id')
                  ->on('delivers')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('township_id');
            $table->foreign('township_id')
                  ->references('id')
                  ->on('townships')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('delivertownships');
    }
}
