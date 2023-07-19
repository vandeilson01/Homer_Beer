<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('PAINEL GESTOR') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto my-10 sm:px-6 lg:px-8">
            <div class="bg-transpaerent overflow-hidden sm:rounded-lg">
                <img class="mt-10" src="{{url('lol_bg.png')}}" />
            </div>
        </div>
    </div>
</x-app-layout>
