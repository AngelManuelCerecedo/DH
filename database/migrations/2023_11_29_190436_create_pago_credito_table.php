<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoCreditoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_credito', function (Blueprint $table) {
            $table->id();
            $table->string ('Abono')->nullable();
            $table->unsignedBigInteger("credito_id")->nullable();
            $table->foreign("credito_id")->references("id")->on("creditos")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pago_credito');
    }
}
