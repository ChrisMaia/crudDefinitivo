<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">      
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-0">Editar Categoria</h1>
                    <hr />
                    <form action="{{ route('adminCategories.update', $categories->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3 form-floating"> 
                                <input type="text" name="name" class="form-control" placeholder="Title" id="floatingInput" value="{{$categories->name}}">
                                <label class="form-label text-body-secondary ms-3"for="floatingInput">Nome da Categoria</label>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3 form-floating">
                                <input type="text" name="description" class="form-control" placeholder="description" id="floatingInput" value="{{$categories->description}}">
                                <label class="form-label text-body-secondary ms-3"for="floatingInput">Descrição</label>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>