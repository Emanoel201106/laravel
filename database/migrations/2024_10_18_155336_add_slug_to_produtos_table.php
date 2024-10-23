<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Produto;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('produtos', function (Blueprint $table) {
        $table->string('slug')->nullable()->after('name');
    });

    $produtos = Produto::all();
    foreach ($produtos as $produto) {
        $produto->slug = Str::slug($produto->name);
        $produto->save();
    }

    Schema::table('produtos', function (Blueprint $table) {
        $table->string('slug')->unique()->change();
    });
}


};
