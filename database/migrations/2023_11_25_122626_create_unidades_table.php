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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table) {

            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
            
        });

        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   

        // sempre fazer o processo reverso
        //primeiro remove as relações 
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //remove a fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign');//table_coluna_foreign
            // remover a coluna unidade id
            $table->dropColumn('unidade_id');
            
        });

        Schema::table('produtos', function (Blueprint $table) {
            //remove a fk
            $table->dropForeign('produtos_unidade_id_foreign');//table_coluna_foreign
            // remover a coluna unidade_id
            $table->dropColumn('unidade_id');
            
        });

        Schema::dropIfExists('unidades');
    }
};
