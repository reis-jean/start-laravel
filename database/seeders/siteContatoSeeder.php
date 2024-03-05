<?php

namespace Database\Seeders;

use App\Models\siteContato;
use Carbon\Factory;
use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



use Illuminate\Support\Facades\DB;

class siteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // factory(SiteContatoFactory::class, 100 )->create();
        \App\Models\siteContato::factory()->count(100)->create();

        // // Instancianciando objeto 
        // $contato = new siteContato();

        // $contato-> nome= 'abrobrinha 123';
        // $contato-> telefone= '(99)000009999';
        // $contato-> email= 'abrobrinha@abrobrinha.com';
        // $contato-> motivo_contato= '1';
        // $contato-> mensagem= 'Estou aqui para falar abrobrinhas 321 123';

        // $contato-> save();

        //   // utilizando o FIll
        // $contato = new siteContato();
        //   $contato->fill([
        //       'nome'  => 'cenoura 123',
        //       'telefone'  => '(99)000009999',
        //       'email'    => 'cenoura@cenourinha.com',
        //       'motivo_contato' => '2',
        //       'mensagem' => 'Alô Aqui é a cenourinha falando....'
        //   ]);
        //   $contato->save();


        // // Utilizando o metodo Create (é necessario ter o atributo fillble na classe) e a classe extender o Model
        // siteContato::create([
        //     'nome'  => 'cenoura 123',
        //     'telefone'  => '(99)000009999',
        //     'email'    => 'cenoura@cenourinha.com',
        //     'motivo_contato' => '2',
        //     'mensagem' => 'Alô Aqui é a cenourinha falando....'
        // ]);

        // //Dando insert no banco
        // //necessario chamar o db: 
        // //use Illuminate\Support\Facades\DB;
        // DB::table('site_contatos')->insert([
        //     'nome'  => 'cenoura 123',
        //     'telefone'  => '(99)000009999',
        //     'email'    => 'cenoura@cenourinha.com',
        //     'motivo_contato' => '2',
        //     'mensagem' => 'Alô Aqui é a cenourinha falando....' 
        // ]);
        
    }
}
