<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedidos_id');
            $table->unsignedBigInteger('produtos_id');
            $table->timestamps();

            $table->foreign('pedidos_id')->references('id')->on('pedidos');
            $table->foreign('produtos_id')->references('id')->on('produtos');
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pedidos_produtos');
    }
};
