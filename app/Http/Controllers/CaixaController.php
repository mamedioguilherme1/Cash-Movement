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

        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y');
        

        $caixas = Caixa::where('data', $date)->get();
    	return view('caixa', compact('caixas'));
    }
    public function buscar(Request $request)
  	{
  		if (auth()->guest())
    		return view('auth.login');

    	$caixas = Caixa::where('data', $request->dataBusca)->orderBy('data', 'ASC')->get();
    	return view('caixa',compact('caixas'));
      }

    public function destroy($id)//Exclui item.
    {
        Caixa::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
       $caixas = Caixa::find($id);

        return view('edit', compact('caixas'));
    }
    public function update(Request $request, $id)//Edita item.
    {
        Caixa::find($id)->update($request->all());
        return redirect()->back();
    }
}
