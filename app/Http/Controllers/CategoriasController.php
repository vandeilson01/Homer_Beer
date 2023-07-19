<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::latest()->paginate(10);
        
        return view('pages.categorias',compact('categorias'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.categorias.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);

        
        $add = Categorias::create([
            'name' => $request->input('name'),
        ]);

        if($add){
            $files = [];
            if ($request->file('img')){
                $file = $request->file('img');
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('categorias/img'), $fileName);
                $files[]['name'] = $fileName;

                Categorias::where('id', $add->id)->update([
                    'img' => $fileName,
                ]);
            }

        }
        
        return redirect('/categoria');

    }

    /**
     * Display the specified resource.
     */
    public function show(Categorias $categorias, $id)
    {
         
        $categorias = Categorias::where('id', $id)->first();

        return view('pages.categorias.show',compact('categorias'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorias $categorias, $id)
    {
        $categorias = Categorias::where('id', $id)->first();
        return json_encode($categorias);
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorias $categorias)
    {
        Categorias::where('id', $request->id)->update([
            'name' => $request->input('name'),
        ]);


        $files = [];
        if ($request->file('img')){
            $file = $request->file('img');
            $fileName = time().rand(1,99).'.'.$file->extension();  
            $file->move(public_path('categorias/img'), $fileName);
            $files[]['name'] = $fileName;

            Categorias::where('id', $request->id)->update([
                'img' => $fileName,
            ]);
        }

        return back();
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorias $categorias, Request $request)
    {
        
        $categorias->where('id', $request->Mid)->delete();
         
        // return redirect('/categoria');
    }

}
