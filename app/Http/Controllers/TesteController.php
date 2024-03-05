<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
   public function teste(int $ps1, int $ps2){
    // echo "A soma de $ps1 + $ps2 é: ". ($ps1+ $ps2);

    // array associativo como parametro da view
    // return view('site.teste', ['x' => $ps1, 'y' => $ps2]);
    //Usa-se o "site.teste" para especificar o arquivo na pasta site
    //Por convensão é ideal que indices dos arrays sejam os mesmos nomes que das variaveis
    //  return view('site.teste', ['ps1' => $ps1, 'ps2' => $ps2]);

    //usando o metodo Compact
    //return view('site.teste', compact('ps1', 'ps2'));

    // usando o metodo with()
    return view('site.teste')->with('ps1', $ps1)->with('ps2', $ps2);

   }
}
