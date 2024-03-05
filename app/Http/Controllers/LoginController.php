<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    public function index(Request $request){
        $erro = ''; 
        
        if($request->get('erro') == 1){
            $erro = 'Usuario e ou senha não existe';
        }

        if($request->get('erro') == 2){
            $erro = 'for favor faça o Login antes de acessar a pagina';
        }

        return view('site.login', ['titulo'=> 'Login', 'erro'=> $erro]);
    }

    public function autenticar(Request $request){

        $regras = ['usuario'=> 'email', 'senha' => 'required'];

        $feedback = [
            'usuario.email'=> 'O campo Senha (e-mail) e obrigatorio', 
            'senha.required'=> 'o campo senha é obrigatoro'
        ];

        $request->validate($regras, $feedback);
        $email = $request->get('usuario');

        $password = $request->get('senha');

        
        $user = new User();
        
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        

        if(isset($usuario->name)){
            echo 'usuaurio exite';

            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            // dd($_SESSION);

            return redirect()->route('app.home');

        }else {
            return redirect()->route('site.login', ['erro'=> 1]);
        }

        print_r($request->all());
        
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
