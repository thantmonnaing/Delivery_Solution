<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaysTable extends Migration
{
    /**
     * Run the migrations.
     *'item_name','township_id','address','phone','item_weight','reciver_name',
     * @return void
     */
    public function up()
    {
        Schema::create('ways', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->unsignedBigInteger('township_id');
            $table->foreign('township_id')
                  ->references('id')
                  ->on('townships')
                  ->onDelete('cascade');

            $table->text('address');
            $table->string('phone');
            $table->float('item_weight')->default(0.0);
            $table->string('receiver_name');     
            
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
        Schema::dropIfExists('ways');
    }
}
