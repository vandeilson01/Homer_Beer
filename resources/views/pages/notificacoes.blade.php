<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('NOTIFICAÇÕES') }}
        </h2>
    </x-slot>

    <div id="root">
         
         <div class="px-4 md:px-10 mx-auto w-full -m-34">
        
           <div class="flex flex-wrap mt-4">
 
             <div class="w-full mb-12 px-4">
                    <button data-modal-target="add-notify" data-modal-toggle="add-notify" class="flex  text-[black] m-1 pr-2 pl-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded   mb-4 float-right hover:bg-[yellow] font-semibold  py-2 px-4 ">
                    <svg class="mt-1 mr-2 w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                         <div>Nova Notificação</div>
                    </button>
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
                         <h1 class="text-2xl p-5">Lista de Notificações</h1>
                         
                             <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                 <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                     <tr>
                                         <th scope="col" class="px-6 py-3">
                                             #
                                         </th>
                                         <th scope="col" class="px-6 py-3">
                                             TITULO
                                         </th>
                                         <th scope="col" class="px-6 py-3">
                                             DATA
                                         </th>
                                         <th scope="col" class="px-6 py-3">
                                             MENSAGEM
                                         </th>
                                         <th scope="col" class="px-6 py-3">
                                             AÇÕES
                                         </th>
                                     </tr>
                                 </thead>
                                 <tbody>
 
                                 @foreach($notificacoes as $noficacao)

                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ ++$i }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $noficacao->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $noficacao->data }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $noficacao->mesage }}
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <form class="formproduct flex">

                                            <button id="{{ $noficacao->id }}" type="button" data-modal-target="edit-notify" data-modal-toggle="edit-notify"  class="edit-notify font-medium bg-[black] text-[white] m-1 p-2 border border-[black] rounded dark:text-blue-500 hover:bg-[#002000]" href="">
                                                EDITAR
                                            </button>

                                            <button type="button"  data-id="{{ $noficacao->id }}" class="delete del-notify  text-[black] m-1 pr-2 pl-2 bg-[#FFD000] hover:bg-[yellow] font-bold border border-[#FFD600] rounded">
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

     <x-modal-notificacoes />

</x-app-layout>
