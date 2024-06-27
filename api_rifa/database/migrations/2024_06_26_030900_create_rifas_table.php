<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rifas', function (Blueprint $table) {
            $table->id();
            $table->string('nombrepremio', 100);
            $table->date('fecha');
            $table->double('precio');
            $table->integer('cantidadnumeros');
            $table->double('meta');
            $table->string('descripcion', 200)->nullable();
            $table->integer('estado')->default(1);
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign("empresa_id")
                ->references("id")
                ->on("empresas")
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
        Schema::dropIfExists('rifas');
    }
}
