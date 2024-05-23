<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Página admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ __("Seja bem vindo!") }}</h1>
                    <div class="d-flex justify-content-start">
                        <p class="p-3"><a href="products" class="btn btn-primary fs-5">Produtos</a></p>
                        <p class="p-3"><a href="#" onclick="return confirm('EM CONSTRUÇÃO!')" class="btn btn-primary fs-5">Categoria</a></p>
                        <p class="p-3"><a href="#" onclick="return confirm('EM CONSTRUÇÃO!')" class="btn btn-primary fs-5">Funcionários</a></p>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
