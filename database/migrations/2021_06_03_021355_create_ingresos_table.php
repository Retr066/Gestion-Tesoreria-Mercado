<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_ingreso_reportes');
            $table->date('ingreso_fecha');
            $table->string('ingreso_codigo');
            $table->string('ingreso_descripcion');
            $table->string('tipo_importe')->nullable();
            $table->double('ingreso_importe', 15, 2);
            $table->timestamps();


            $table->foreign('id_ingreso_reportes')->references('id')->on('list_reportes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
