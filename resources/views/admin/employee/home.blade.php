<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">      
            {{ __('Página de administração de funcionários') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista de Funcionários</h1>
                        <a href="{{ route('adminEmployees.create') }}" class="btn btn-primary">Adicionar Funcionários</a>
                    </div>
                    <hr />
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>