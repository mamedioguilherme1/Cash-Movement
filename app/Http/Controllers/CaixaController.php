<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caixa;

class CaixaController extends Controller
{
    public function index()
    {
    	if (auth()->guest())
    		return view('auth.login');
    	return view('caixa');
    }
    public function buscar()
  	{
  		if (auth()->guest())
    		return view('auth.login');
    	$caixas = Caixa::all();
    	return view('caixaBusca',compact('caixas'));
 	}
}
