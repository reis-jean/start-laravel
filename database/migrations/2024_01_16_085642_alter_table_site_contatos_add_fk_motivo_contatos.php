<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //adcionando a coluna motivo_contatos_id 
        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');

        });

        // chamnado a class DB::statement para executar uma query no banco
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //Criando a FK e removendo a coluna motivo_contato
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');

        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          //Criando coluna motivo_contato e removendo a FK
          Schema::table('site_contatos', function(Blueprint $table){
              $table->interger('motivo_contato');
              $table->dropForeign('site_contatos_motivo_id_foreign');              
            });
        
            DB::statement('upadate site_contatos set motivo_contato = motivo_contatos_id');
            
            Schema::table('site_contatos', function(Blueprint $table){
                $table->dropColumn('motivo_contatos_id');
            });

    }
};
