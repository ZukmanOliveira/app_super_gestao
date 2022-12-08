<?php

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    
    public function up(): void
    {
        /*Criando tabela filiais*/
        Schema::create('filiais',function(Blueprint $table)
        {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });
        /*Criando tabela pivo para ser ultilizada no realacionamento entre as tabelas filiais e produtos */
        Schema::create('produtos_filiais', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('filiais_id');
            $table->unsignedBigInteger('produtos_id');
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(0);
            $table->integer('estoque_maximo')->default(0);
            $table->timestamps();

            /*Criando relacionamento entre as tabelas produtos e filiais com sua tabala pivo*/
            $table->foreign('filiais_id')->references('id')->on('filiais');
            $table->foreign('produtos_id')->references('id')->on('produtos');

        });
        /*Removendo colunas da tabela produtos*/
        Schema::table('produtos', function(Blueprint $table)
        {
            $table->dropColumn('preco_venda','estoque_minimo','estoque_maximo');
        });
    }

    public function down(): void
    {
        Schema::table('produtos', function(Blueprint $table)
        {
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });
        Schema::dropIfExists('produtos_filiais');

        Schema::dropIfExists('filiais');
    }
};
