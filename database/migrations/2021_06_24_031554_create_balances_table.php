<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lote_id')->unsigned();
            $table->double('sum_aportacion', 15, 2)->nullable();
            $table->double('sum_multas', 15, 2)->nullable();
            $table->double('sum_deudas', 15, 2)->nullable();
            $table->double('sum_atrazadas_alquiler', 15, 2)->nullable();
            $table->double('sum_guard', 15, 2)->nullable();
            $table->double('sum_interno', 15, 2)->nullable();
            $table->double('sum_alquiler', 15, 2)->nullable();
            $table->double('sum_ambulante', 15, 2)->nullable();
            $table->double('sum_agua', 15, 2)->nullable();
            $table->double('sum_publica', 15, 2)->nullable();
            $table->double('sum_autovaluo', 15, 2)->nullable();
            $table->double('sum_donaciones', 15, 2)->nullable();
            $table->double('sum_varios', 15, 2)->nullable();

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
        Schema::dropIfExists('balances');
    }
}
