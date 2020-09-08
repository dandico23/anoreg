<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartorios', function (Blueprint $table) {
            $table->id();
			$table->string('nome');
            $table->string('razao');
            $table->string('documento', 14);
            $table->string('cep', 8);
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('tabeliao');
            $table->boolean('ativo');
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
        Schema::dropIfExists('cartorios');
    }
}
