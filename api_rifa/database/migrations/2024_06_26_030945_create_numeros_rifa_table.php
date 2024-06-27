<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumerosRifaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numeros_rifa', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->double('monto');
            $table->integer('estado')->default(1);
            $table->unsignedBigInteger('rifa_id')->nullable();
            $table->unsignedBigInteger('participante_id')->nullable();
            $table->foreign("rifa_id")
                ->references("id")
                ->on("rifas")
                ->onDelete('set null');

            $table->foreign("participante_id")
            ->references("id")
            ->on("participantes")
            ->onDelete('set null');
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
        Schema::dropIfExists('numeros_rifa');
    }
}
