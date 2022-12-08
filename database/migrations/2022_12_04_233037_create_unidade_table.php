<?php

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade',5);
            $table->string('descricao',40);
            $table->timestamps();
        });

        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        Schema::table('produto_detalhes',function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    public function down():void
    {
        /*Removendo relacionamento de unidade da tabala produtos_detalhes*/
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        /*Removendo relacionamento de unidade da tabela produtos*/
        Schema::table('produtos', function(Blueprint $table)
        {
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};