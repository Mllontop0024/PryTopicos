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
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->date('birth_date');
            $table->date('planting_date');
            $table->double('latitude');
            $table->double('longitude');
            $table->text('qr');
            $table->text('description');
            $table->unsignedBigInteger('family_id');
            $table->unsignedBigInteger('specie_id');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('family_id')->references('id')->on('families');
            $table->foreign('specie_id')->references('id')->on('species');
            $table->foreign('zone_id')->references('id')->on('zones');
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
        Schema::dropIfExists('trees');
    }
};
