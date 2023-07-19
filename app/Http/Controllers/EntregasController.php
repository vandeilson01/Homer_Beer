<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;

class EntregasController extends Controller
{
    public function index()
    {
        $entrega = Entrega::latest()->paginate(10);
        
        return view('pages.entregas',compact('entregas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.entregas.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        Entrega::create([
            'valor_entrega' => $request->input('valor_entrega'),
            'tempo_entrega' => $request->input('tempo_entrega'),
        ]);

        return redirect('/entregas');

    }

    /**
     * Display the specified resource.
     */
    public function show(Entrega $entrega, $id)
    {
         
        $entrega = Entrega::where('id', $id)->first();

        return view('pages.entregas.show',compact('entregas'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrega $entrega, $id)
    {
        $entrega = Entrega::where('id', $id)->first();
        return json_encode($entrega);
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrega $entrega)
    {
        
        Entrega::where('id', $request->id)->update([
            'valor_entrega' => $request->input('valor_entrega'),
            'tempo_entrega' => $request->input('tempo_entrega'),
        ]);

        return back();
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrega $entrega, Request $request)
    {
        
        $entrega->where('id', $request->Mid)->delete();
         
        // return redirect('/categoria');
    }

}
