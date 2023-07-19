<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('ENTREGAS') }}
        </h2>
    </x-slot>

    <div id="root">
         
         <div class="px-4 md:px-10 mx-auto w-full -m-34">
        
           <div class="flex flex-wrap mt-4">
 
             <div class="w-full mb-12 px-4">
                    <!-- <button data-modal-target="add-notify" data-modal-toggle="add-notify" class="flex  text-[black] m-1 pr-2 pl-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded   mb-4 float-right hover:bg-[yellow] font-semibold  py-2 px-4 ">
                    <svg class="mt-1 mr-2 w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                         <div>Nova Notificação</div>
                    </button> -->
               <div
                 class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
               >
 
               @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                         <p>{{ $message }}</p>
                     </div>
                @endif
 
                 
                 <div class="block w-full overflow-x-auto">
                    
                         <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <h1 class="text-2xl p-5">Taxa de Entrega</h1>
                             <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                 <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                 </thead>
                                 <tbody>
 
                                 @foreach($entregas as $entrega)

                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            Taxa de entrega atual: R$ {{ $entrega->valor_entrega }}
                                        </td>
                                        <td class="px-6 py-4">
                                            Tempo para entrega: {{ $entrega->tempo_entrega }} minutos
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <form class="formproduct flex">

                                            <button id="{{ $entrega->id }}" type="button" data-modal-target="edit-entrega" data-modal-toggle="edit-entrega"  class="edit-entrega p-2 text-[black] m-1 pr-2 pl-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded">
                                                EDITAR
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

     <x-modal-entregas />
</x-app-layout>
