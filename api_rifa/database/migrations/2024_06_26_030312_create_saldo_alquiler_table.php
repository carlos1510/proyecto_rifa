<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_alquiler', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->integer('saldo');
            $table->integer('estadoactivacion');
            $table->integer('estadopago');

            $table->unsignedBigInteger('pago_alquiler_id')->nullable();

            $table->foreign("pago_alquiler_id")
                ->references("id")
                ->on("pago_alquiler")
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
        Schema::dropIfExists('saldo_alquiler');
    }
}
