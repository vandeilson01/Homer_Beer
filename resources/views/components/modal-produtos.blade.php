@php 

use App\Models\Categorias;

@endphp 

<!-- Main modal -->
<div id="edit-product" tabindex="-1" aria-hidden="true" class="fixed bg-[#525252] top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button data-modal-hide="edit-product" type="button" class="close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar <span class="name"></span></h3>
                <form class="space-y-6" action="{{ url('produto/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Produto</label>
                        <input placeholder="Roupa" type="text" name="name" value="" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        <input type="hidden" name="id" id="id" value="" required>
                    </div> 

                    <div>
                        <label for="categoria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option class="my_categori" value=""></option>
                            @foreach(Categorias::all() as $categorias)
                                <option value="{{$categorias->id}}">{{$categorias->name}}</option>
                            @endforeach

                        </select>
                    </div> 

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição do produto</label>
                        <textarea placeholder="Escrever descrição" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                    </div> 

                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preço</label>
                        <input placeholder="50.0" type="text" name="price" value="" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> 

                    <div>
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantidade de Stock</label>
                        <input placeholder="50" type="text" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> 
 

                    <div>
                        <label for="img-edit-prod">Imagem</label>
                    </div>
                    <div>
                        <img src="" class="my_img"/>
                    </div>

                    <div class="flex items-center p-2 justify-center w-full">
                        <label for="img-edit-prod" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="img" id="img-edit-prod" type="file" class="hidden" />
                        </label>
                    </div> 
 
                   
                    <div class="flex p-2 place-content-end space-x-2 rounded-b dark:border-gray-600">
                        <button  type="submit" class=" text-[black] m-1 p-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded">Editar produto</button>
                        <button data-modal-hide="edit-product" type="button" class="font-medium bg-[black] text-[white] m-1 p-2 border border-[black] rounded dark:text-blue-500 hover:bg-[#002000]">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


<!-- Main modal -->
<div id="add-product" tabindex="-1" aria-hidden="true" class="fixed bg-[#525252] top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button data-modal-hide="add-product" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Criar produto</h3>
                <form class="space-y-6" action="{{ url('produto/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Produto</label>
                        <input placeholder="Roupa" type="text" name="name" value="" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> 

                    <div>
                        <label for="categoria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Selecione uma Categoria</option>

                            @foreach(Categorias::all() as $categorias)
                                <option value="{{$categorias->id}}">{{$categorias->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição do produto</label>
                        <textarea placeholder="Escrever descrição" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                    </div> 

                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preço</label>
                        <input placeholder="50.0" type="text" name="price" value="" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> 

                    <div>
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantidade de Stock</label>
                        <input placeholder="50" type="text" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> 
 

                    <div class="flex items-center justify-center w-full">
                        <label for="img-add-prod" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="img" id="img-add-prod" type="file" class="hidden" />
                        </label>
                    </div> 

                    <div class="flex place-content-end space-x-2 rounded-b dark:border-gray-600">
                        <button  type="submit" class=" text-[black] m-1 p-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded">Criar Produto</button>
                        <button data-modal-hide="add-product" type="button" class="font-medium bg-[black] text-[white] m-1 p-2 border border-[black] rounded dark:text-blue-500 hover:bg-[#002000]">Cancelar</button>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
</div> 
