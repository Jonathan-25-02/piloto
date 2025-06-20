<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListadoPrediosTable extends Migration
{
    public function up()
    {
        Schema::create('listado_predios', function (Blueprint $table) {
            $table->id();
            $table->string('propietario');
            $table->string('clave');
            $table->double('latitud1');
            $table->double('longitud1');
            $table->time('hora_p1')->nullable();
            $table->double('latitud2');
            $table->double('longitud2');
            $table->time('hora_p2')->nullable();
            $table->double('latitud3');
            $table->double('longitud3');
            $table->time('hora_p3')->nullable();
            $table->double('latitud4');
            $table->double('longitud4');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listado_predios');
    }
}
