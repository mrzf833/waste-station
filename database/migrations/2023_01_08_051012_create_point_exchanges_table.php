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
        Schema::create('point_exchanges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('item_point_id');
            $table->bigInteger('point_price');
            $table->string('recipient');
            $table->text('address');
            $table->string('postal_code');
            $table->timestamp('accepted')->nullable();
            $table->enum('status', ['0', '1', '2', '3'])->comment('0: process; 1 : dikirim; 2 : diterima; 3 : ditolak')->default('0');
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
        Schema::dropIfExists('point_exchanges');
    }
};
