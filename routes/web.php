<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\NotificacoesController;
use App\Http\Controllers\EntregasController;
use App\Models\Categorias;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::get('/categoria', [HomeController::class, 'categorias'])->middleware(['auth', 'verified'])->name('categoria');
    
    Route::get('/categoria_all', function(){
        return Categorias::all();
    });

    Route::get('/categoria_all/{id}', function($id){
        return Categorias::where('id', $id)->get();
    });

    Route::get('/categoria_first/{id}', function($id){
        return Categorias::where('id', $id)->first();
    });
 
    // Route::get('/categorias',[CategoriasController::class, 'index'] )->middleware(['auth', 'verified'])->name('categoria');
    Route::get('/categoria/create',[CategoriasController::class, 'create'] )->middleware(['auth', 'verified'])->name('categoria.create');
    Route::post('/categoria/update',[CategoriasController::class, 'update'] )->middleware(['auth', 'verified'])->name('categoria.update');
    Route::post('/categoria/store',[CategoriasController::class, 'store'] )->middleware(['auth', 'verified'])->name('categoria.store');
    Route::get('/categoria/show/{id}',[CategoriasController::class, 'show'] )->middleware(['auth', 'verified'])->name('categoria.show');
    Route::get('/categoria/edit/{id}',[CategoriasController::class, 'edit'] )->middleware(['auth', 'verified'])->name('categoria.edit');
    Route::post('/categoria/destroy',[CategoriasController::class, 'destroy'] )->middleware(['auth', 'verified'])->name('categoria.destroy');

    Route::get('/produto', [HomeController::class, 'produtos'])->name('produto');

    // Route::get('/categorias',[CategoriasController::class, 'index'] )->middleware(['auth', 'verified'])->name('categoria');
    Route::get('/produto/create',[ProdutosController::class, 'create'] )->middleware(['auth', 'verified'])->name('produto.create');
    Route::post('/produto/update',[ProdutosController::class, 'update'] )->middleware(['auth', 'verified'])->name('produto.update');
    Route::post('/produto/store',[ProdutosController::class, 'store'] )->middleware(['auth', 'verified'])->name('produto.store');
    Route::get('/produto/show/{id}',[ProdutosController::class, 'show'] )->middleware(['auth', 'verified'])->name('produto.show');
    Route::get('/produto/edit/{id}',[ProdutosController::class, 'edit'] )->middleware(['auth', 'verified'])->name('produto.edit');
    Route::post('/produto/destroy',[ProdutosController::class, 'destroy'] )->middleware(['auth', 'verified'])->name('produto.destroy');

    
    Route::get('/notificacao', [HomeController::class, 'notificacoes'])->name('notificacao');


    Route::get('/notificacao/create',[NotificacoesController::class, 'create'] )->middleware(['auth', 'verified'])->name('notificacao.create');
    Route::post('/notificacao/update',[NotificacoesController::class, 'update'] )->middleware(['auth', 'verified'])->name('notificacao.update');
    Route::post('/notificacao/store',[NotificacoesController::class, 'store'] )->middleware(['auth', 'verified'])->name('notificacao.store');
    Route::get('/notificacao/show/{id}',[NotificacoesController::class, 'show'] )->middleware(['auth', 'verified'])->name('notificacao.show');
    Route::get('/notificacao/edit/{id}',[NotificacoesController::class, 'edit'] )->middleware(['auth', 'verified'])->name('notificacao.edit');
    Route::post('/notificacao/destroy',[NotificacoesController::class, 'destroy'] )->middleware(['auth', 'verified'])->name('notificacao.destroy');


    Route::get('/entrega', [HomeController::class, 'entrega'])->name('entrega');


    Route::get('/entrega/create',[EntregasController::class, 'create'] )->middleware(['auth', 'verified'])->name('entrega.create');
    Route::post('/entrega/update',[EntregasController::class, 'update'] )->middleware(['auth', 'verified'])->name('entrega.update');
    Route::post('/entrega/store',[EntregasController::class, 'store'] )->middleware(['auth', 'verified'])->name('entrega.store');
    Route::get('/entrega/show/{id}',[EntregasController::class, 'show'] )->middleware(['auth', 'verified'])->name('entrega.show');
    Route::get('/entrega/edit/{id}',[EntregasController::class, 'edit'] )->middleware(['auth', 'verified'])->name('entrega.edit');
    Route::post('/entrega/destroy',[EntregasController::class, 'destroy'] )->middleware(['auth', 'verified'])->name('entrega.destroy');

});
