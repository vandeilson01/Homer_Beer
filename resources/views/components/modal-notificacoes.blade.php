@php 

use App\Models\Categorias;

@endphp 

<!-- Main modal -->
<div id="edit-notify" tabindex="-1" aria-hidden="true" class="fixed bg-[#525252] top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button data-modal-hide="edit-notify" type="button" class="close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar <span class="name"></span></h3>
                <form class="space-y-6" action="{{ url('notificacao/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo da Notificações</label>
                        <input placeholder="Taxa de Entrega" type="text" name="name" value="" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        <input type="hidden" name="id" id="id" value="" required>
                    </div> 

                    <div>
                        <label for="data" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data</label>
                        <input type="date" name="data" value="" id="data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> 

                    <div>
                        <label for="mesage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensagem</label>
                        <textarea placeholder="Escrever mensagem" name="mesage" id="mesage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                    </div> 

                  
                    <div class="flex p-2 place-content-end space-x-2 rounded-b dark:border-gray-600">
                        <button  type="submit" class=" text-[black] m-1 p-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded">Editar Notificações</button>
                        <button data-modal-hide="edit-notify" type="button" class="font-medium bg-[black] text-[white] m-1 p-2 border border-[black] rounded dark:text-blue-500 hover:bg-[#002000]">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


<!-- Main modal -->
<div id="add-notify" tabindex="-1" aria-hidden="true" class="fixed bg-[#525252] top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button data-modal-hide="add-notify" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Nova Notificações</h3>
                <form class="space-y-6" action="{{ url('notificacao/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo da Notificações</label>
                        <input placeholder="Taxa de Entrega" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> 

                    <div>
                        <label for="data" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data</label>
                        <input type="date" name="data" id="data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> 

                    <div>
                        <label for="mesage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensagem</label>
                        <textarea placeholder="Escrever notificação" name="mesage" id="mesage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                    </div> 

                    <div class="flex place-content-end space-x-2 rounded-b dark:border-gray-600">
                        <button  type="submit" class=" text-[black] m-1 p-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded">Criar Notificações</button>
                        <button data-modal-hide="add-notify" type="button" class="font-medium bg-[black] text-[white] m-1 p-2 border border-[black] rounded dark:text-blue-500 hover:bg-[#002000]">Cancelar</button>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
</div> 
