<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">      
            {{ __('Criar Categoria') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-0">Adicionar Categoria</h1>
                    <hr />
                    @if (Session::has('error'))
                        <div >
                            {{ Session('error') }}
                        </div>
                    @endif

                    <p><a href="{{ route('adminCategories.index') }}" class="btn btn-primary">Voltar</a></p>
                   
                    <form action="{{ route('adminCategories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nome da Categoria" value="{{old('name')}}">
                                <label class="text-body-secondary ms-3"for="floatingInput">Nome da Categoria</label>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="text" name="description" class="form-control" id="floatingInput" placeholder="Descrição" value="{{old('description')}}">
                                <label class="text-body-secondary ms-3" for="floatingInput">Descrição</label>
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
