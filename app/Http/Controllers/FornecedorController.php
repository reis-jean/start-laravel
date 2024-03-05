<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        dd($request->all());
        return view('app.fornecedor.listar');
    }
    public function adicionar(Request $request){
        print_r($request->all());

        $msg = ''; 

            if($request->input('_token') != ''){
                
                $regras = [
                    'nome' => 'required|min:3|max:40', 
                    'site' => 'required', 
                    'uf' => 'required|min:2|max:2', 
                    'email' => 'email'
                ];

                $feedback = [ 
                    'required' => 'O campo :attribute deve ser preenchido ', 
                    'nome.min' => 'O Campo de nome deve ter no minimo 3 caracteres', 
                    'nome.max' => 'O Campo de nome deve ter no maximo 40 caracteres', 
                    'uf.mim' => 'O campo Ud deve ter no minimo 2 caracteres', 
                    'uf.max' => 'O campo UF deve ter no maximo 2 caracteres', 
                    'email.email' => 'O Campo de e-mail não foi preenchido corretamente'
                ];

                $request->validate($regras, $feedback);

                $fornecedor = new Fornecedor();
                $fornecedor-> create($request->all());


                // echo "chegamos aqui";

                $msg = "Cadastro realizado com Sucesso";
            }



        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }


}
