<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        /**Criando a coluna que ira substituir uma ja'existente no banco de dados */
        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');


        //criando  a FK e removendo a coluna 
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    public function down(): void
    {   /** criando coluna motivo_contato na tabela site_contato e realizando drop na chave estrageira da tabela motivo_contato*/
        Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropColumn('site_contatos_motivo_contatos_id_foreign');
        });
        //migrando dados da tabela motivo_contato_id para coluna motivo_contato_id da tabela site_contato
        DB::statement('update site_contato set motivo_contato = motivo_contatos_id');
        //removendo a coluna motivo contatos id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
};