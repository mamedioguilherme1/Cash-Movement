<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caixa;

class ExtratoController extends Controller
{

    public function index()
    {
    	if (auth()->guest())
    		return view('auth.login');

        $caixas = [];
    	return view('extrato', compact('caixas'));
    }

    public function gerar(Request $request)
  	{
  		if (auth()->guest())
    		return view('auth.login');

    	$caixas = Caixa::where('data', '>=', $request->dataInic, 'AND', $request->dataFinal , '<=')->orderBy('data', 'ASC')->get();
    	return view('extrato',compact('caixas', 'caixaData'));
 	}

    public function destroy($id)
    {
        Caixa::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
       $caixas = Caixa::find($id);
        return view('edit', compact('caixas'));
    }
}
