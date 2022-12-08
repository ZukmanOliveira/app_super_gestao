<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('fornecedores',function(Blueprint $table)
        {
            $table->string('uf', 2);
            $table->string('email', 250);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('uf','email');
    }

};
