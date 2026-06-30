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
        Schema::table('casos', function (Blueprint $table) {
            $table->boolean('entrevista')->default(false)->after('data_finalizado');
            $table->boolean('copia_hd')->default(false)->after('entrevista');
            $table->boolean('copia_celular')->default(false)->after('copia_hd');
            $table->boolean('monitoramento')->default(false)->after('copia_celular');
            $table->boolean('pesquisa_campo')->default(false)->after('monitoramento');
        });
    }

    public function down(): void
    {
        Schema::table('casos', function (Blueprint $table) {
            $table->dropColumn(['entrevista', 'copia_hd', 'copia_celular', 'monitoramento', 'pesquisa_campo']);
        });
    }
};
