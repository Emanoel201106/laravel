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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->string('avaliação');
            $table->string('estrelas');
            $table->string('image');
            $table->decimal('price', 6, 2);
            $table->decimal('desconto', 6, 2);
            $table->string('categoria');
            $table->integer('ano');
            $table->string('porcentagem');
            $table->string('editora');
            $table->text('descrição');
            $table->integer('pagina');
            $table->integer('idade');
            $table->string('dimensao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
