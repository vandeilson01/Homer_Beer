<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::latest()->paginate(10);
        
        return view('pages.produtos',compact('produtos'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.produtos.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        $add = Produtos::create([
            'name' => $request->input('name'),
            'categoria_id' => $request->input('categoria_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);

        if($add){
            $files = [];
            if ($request->file('img')){
                $file = $request->file('img');
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('produtos/img'), $fileName);
                $files[]['name'] = $fileName;

                Produtos::where('id', $add->id)->update([
                    'img' => $fileName,
                ]);
            }

        }
        
        return redirect('/produtos');

    }

    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos, $id)
    {
         
        $produtos = Produtos::where('id', $id)->first();

        return view('pages.produtos.show',compact('produtos'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtos $produtos, $id)
    {
        $produtos = Produtos::where('id', $id)->first();
        return json_encode($produtos);
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produtos $produtos)
    {
        Produtos::where('id', $request->id)->update([
            'name' => $request->input('name'),
            'categoria_id' => $request->input('categoria_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);


        $files = [];
        if ($request->file('img')){
            $file = $request->file('img');
            $fileName = time().rand(1,99).'.'.$file->extension();  
            $file->move(public_path('produtos/img'), $fileName);
            $files[]['name'] = $fileName;

            Produtos::where('id', $request->id)->update([
                'img' => $fileName,
            ]);
        }

        return back();
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produtos, Request $request)
    {
        
        $produtos->where('id', $request->Mid)->delete();
         
        // return redirect('/categoria');
    }

}
