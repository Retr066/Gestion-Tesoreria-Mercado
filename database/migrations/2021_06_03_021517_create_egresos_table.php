<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_egreso_reportes');
            $table->date('egreso_fecha');
            $table->string('egreso_codigo');
            $table->string('egreso_descripcion');
            $table->string('tipo_importe_egreso')->nullable();
            $table->double('egreso_importe', 15, 2);
            $table->timestamps();

            $table->foreign('id_egreso_reportes')->references('id')->on('list_reportes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egresos');
    }
}
