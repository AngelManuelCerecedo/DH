<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->string ('Total')->nullable();
            $table->unsignedBigInteger("venta_id")->nullable();
            $table->foreign("venta_id")->references("id")->on("ventas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id")->on("clientes")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("sucursal_id")->nullable();
            $table->foreign("sucursal_id")->references("id")->on("sucursals")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Folio')->nullable();
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
        Schema::dropIfExists('credito_');
    }
}
