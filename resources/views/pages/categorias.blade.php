<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('CATEGORIAS') }}
        </h2>
    </x-slot>

    <div id="root">
         
         <div class="px-4 md:px-10 mx-auto w-full -m-34">
        
           <div class="flex flex-wrap mt-4">
 
             <div class="w-full mb-12 px-4">
                    <button data-modal-target="add-categori" data-modal-toggle="add-categori" class="flex  text-[black] m-1 pr-2 pl-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded   mb-4 float-right hover:bg-[yellow] font-semibold  py-2 px-4 ">
                    <svg class="mt-1 mr-2 w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                         <div>Novo Produto</div>
                    </button>
               <div
                 class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
               >
 
               @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                         <p>{{ $message }}</p>
                     </div>
                @endif
              
  
                 <div class="rounded-t mb-0 px-4 py-3 border-0">
                   <div class="flex flex-wrap items-center">
                     <div
                       class="relative w-full px-4 max-w-full flex-grow flex-1"
                     >
<!--  
                     <a href="{{ url('especialist/create') }}" class="bg-transparent float-right hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                         <svg class="w-[24px] h-[24px] text-blueth-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                         </svg> 
                     </a> -->
                     </div>
                   </div>
                 </div>
 
                 
                 <div class="block w-full overflow-x-auto">
                    
                         <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <h1 class="text-2xl p-5">Lista de Categorias</h1>
                             <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                 <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                     <tr>
                                         <th scope="col" class="px-6 py-3">
                                             ID
                                         </th>
                                         <th scope="col" class="px-6 py-3">
                                             NOME DA CATEGORIA
                                         </th>
                                         <th scope="col" class="px-6 py-3">
                                             AÇÕES
                                         </th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 @foreach($categorias as $categoria)
                                    
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ ++$i }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $categoria->name }}
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <form class="formcategori flex">
                            
                                                <button data-modal-target="edit-categori" data-modal-toggle="edit-categori" type="button" id="{{ $categoria->id }}"  class="edit-categori font-medium bg-[black] text-[white] m-1 p-2 border border-[black] rounded dark:text-blue-500 hover:bg-[#002000]" href="">
                                                    EDITAR
                                                </button>
                                
                                                <button type="button" data-id="{{ $categoria->id }}" class="del-categori  text-[black] m-1 pr-2 pl-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded">
                                                    APAGAR
                                                </button>

                                            </form>
                                        </td>
                                     
                                    </tr>

                                @endforeach

                                 </tbody>
                             </table>
                         </div>
 
                 </div>
               </div>
             </div>
 
           </div>
 
           </div>
       </div>
     </div>


     <x-modal-categorias />
</x-app-layout>
