<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;



use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instancianciando objeto 
          $fornecedor = new Fornecedor();

          $fornecedor-> nome= 'Casa tech';
          $fornecedor-> site= 'Fornecedor100.com';
          $fornecedor-> uf = 'ce';
          $fornecedor-> email= 'Contato@casaTech.com';

          $fornecedor-> save();

            // utilizando o FIll
          $fornecedor = new Fornecedor();
            $fornecedor->fill([
                'nome'  => 'Fornecedor 100',
                'site'  => 'fornecedor100.com.br',
                'uf'    => 'CE',
                'email' => 'contato@fornecedor100.com.br'
            ]);
            $fornecedor->save();


          // Utilizando o metodo Create (é necessario ter o atributo fillble na classe) e a classe extender o Model
          Fornecedor::create([
            'nome' => 'Fornecedor 200', 
            'site' => 'fornedor200.com.br', 
            'uf' => 'RS', 
            'email' => 'Contato@fornecedor200.com' 
          ]);

          //Dando insert no banco
          //necessario chamar o db: 
          //use Illuminate\Support\Facades\DB;
          DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300', 
            'site' => 'fornedor300.com.br', 
            'uf' => 'SP', 
            'email' => 'Contato@fornecedor300.com' 
          ]);
          
    }
}
