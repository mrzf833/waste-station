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
        Schema::create('item_points', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('point');
            $table->bigInteger('stock');
            $table->string('image');
            $table->text('description1')->nullable();
            $table->text('description2')->nullable();
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
        Schema::dropIfExists('item_points');
    }
};
