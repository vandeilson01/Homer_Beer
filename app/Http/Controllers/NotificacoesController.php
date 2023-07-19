<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacoes;

class NotificacoesController extends Controller
{
    public function index()
    {
        $notificacoes = Notificacoes::latest()->paginate(10);
        
        return view('pages.notificacoes',compact('notificacoes'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.notificacoes.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        $add = Notificacoes::create([
            'name' => $request->input('name'),
            'data' => $request->input('data'),
            'mesage' => $request->input('mesage'),
        ]);
        
        return redirect('/notificacao');

    }

    /**
     * Display the specified resource.
     */
    public function show(Notificacoes $notificacoes, $id)
    {
         
        $notificacoes = Notificacoes::where('id', $id)->first();

        return view('pages.notificacoes.show',compact('notificacoes'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notificacoes $notificacoes, $id)
    {
        $notificacoes = Notificacoes::where('id', $id)->first();
        return json_encode($notificacoes);
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notificacoes $notificacoes)
    {
        Notificacoes::where('id', $request->id)->update([
            'name' => $request->input('name'),
            'data' => $request->input('data'),
            'mesage' => $request->input('mesage'),
        ]);


        $files = [];
        if ($request->file('img')){
            $file = $request->file('img');
            $fileName = time().rand(1,99).'.'.$file->extension();  
            $file->move(public_path('notificacoes/img'), $fileName);
            $files[]['name'] = $fileName;

            Notificacoes::where('id', $request->id)->update([
                'img' => $fileName,
            ]);
        }

        return back();
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notificacoes $notificacoes, Request $request)
    {
        
        $notificacoes->where('id', $request->Mid)->delete();
         
        // return redirect('/categoria');
    }

}
