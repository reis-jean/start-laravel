<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use app\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(LogAcessoMiddleware::class);

    // }
    public function sobreNos(){
        return view('site.sobre-nos');
    }
}
