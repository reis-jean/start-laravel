<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato( Request $request){
        // echo '<pre>';
        // print_r($request->all()); // função imprime e da um die();
        // echo '</pre>';
        // var_dump($_POST);

        // echo $request->input('nome');
        // echo '<br>';
        // echo $request->input('email');
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem'); 
        // $contato->save();

        // outra foram é: 
            // $contato = new SiteContato();
            // $contato ->fill($request->all());
            // $contato->save();
            //ou apenas dar um create all:
            //$contato->create($request->all());
            //lembrete: para usar o metodo fill() temos que definir o tributo protected no model: 
                //exemplo:   protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem']; 
        

        // print_r($contato-> getAttributes());

            $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'contato (teste)', 'motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request){

        //Realizar a validação dos dados obrigatorios
        $request->validate([
            'nome'=>'required|min:3|max:40|unique:site_contatos', //nome com no minimo 3 caracteres
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ],
        [
            'nome.required' =>  'O campo nome precisa ser preenchido', 'nome.min' => 'O nome precisa ter pelo menos 3 caracteres', 'nome.max' => 'Campo precisa ter no maximo 30 caracteres', 'nome.unique' => 'Já existe esse registro', 
            // adicionando mensagem generica na validação
            'mensagem' => 'O campo :attribute de ser preenchido'
        ]
    );

        //Na documentação Laravel existem o item validation
            //onde é citado todos os metodos de validação. 


       siteContato::create($request->all());
       return redirect()->route('site.index');
    }
}
