<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('listado_predios', function (Blueprint $table) {
        $table->id();
        $table->string('propietario');
        $table->string('clave');
        $table->double('latitud1');
        $table->double('longitud1');
        $table->double('latitud2');
        $table->double('longitud2');
        $table->double('latitud3');
        $table->double('longitud3');
        $table->double('latitud4');
        $table->double('longitud4');
        $table->time('hora_p1')->nullable();
        $table->time('hora_p2')->nullable();
        $table->time('hora_p3')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listado_predios');
    }
};
