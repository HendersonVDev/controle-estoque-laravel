<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_estoque_id')->nullable()->after('categoria');
            // $table->foreign('categoria_estoque_id')->references('id')->on('categorias_estoque')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            if (Schema::hasColumn('produtos', 'categoria_estoque_id')) {
                $table->dropColumn('categoria_estoque_id');
            }
        });
    }
};
