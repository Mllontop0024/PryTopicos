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
        Schema::create('specie_photos', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('specie_id');
            $table->foreign('specie_id')->references('id')->on('species')->onDelete('cascade');
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
        Schema::dropIfExists('specie_photos');
    }
};
