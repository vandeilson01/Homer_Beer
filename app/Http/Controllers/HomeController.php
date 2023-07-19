<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Produtos;
use App\Models\Notificacoes;
use App\Models\Entrega;

class HomeController extends Controller
{
     
    public function categorias()
    {
        $categorias = Categorias::latest()->paginate(10);
        
        return view('pages.categorias',compact('categorias'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function produtos()
    {
        $produtos = Produtos::latest()->paginate(10);
        
        return view('pages.produtos',compact('produtos'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function notificacoes()
    {
        $notificacoes = Notificacoes::latest()->paginate(10);
        
        return view('pages.notificacoes',compact('notificacoes'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function entrega()
    {
        $entregas = Entrega::latest()->paginate(10);
        
        return view('pages.entregas',compact('entregas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
}
