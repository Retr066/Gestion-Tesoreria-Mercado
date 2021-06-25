<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_reportes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lote_id')->unsigned();
            $table->enum('estado',['Generado','Proceso','Terminado']);
            $table->enum('mes',['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre']);
            $table->double('ingreso_importe_total', 15, 2);
            $table->double('egreso_importe_total', 15, 2);
            $table->double('liquidez', 15, 2);
            $table->timestamps();
            $table->foreign('lote_id')->references('id')->on('lotes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_reportes');
    }
}
