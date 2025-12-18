<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Remove o campo antigo de texto
            $table->dropColumn('categoria');

            // Adiciona a chave estrangeira corretamente
            $table->foreignId('categoria_id')
                  ->nullable()
                  ->constrained('categorias')
                  ->onDelete('set null');
            $table->foreign('categoria_estoque_id')
                    ->references('id')
                    ->on('categorias_estoque')
                    ->nullOnDelete();

        });
    }

    public function down(): void
    {

        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');
            $table->string('categoria')->nullable(); // recria o campo antigo se for preciso reverter
        });
    }
};

