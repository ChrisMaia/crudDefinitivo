<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">      
            {{ __('Editar produto') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-0">Editar produto</h1>
                    <hr />
                    <form action="{{ route('adminProducts.update', $products->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3 form-floating"> 
                                <input type="text" name="title" class="form-control" placeholder="Title" id="floatingInput" value="{{$products->title}}">
                                <label class="form-label text-body-secondary ms-3"for="floatingInput">Nome do Produto</label>
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col ">
                                <label for="category_id">Categoria:</label>
                                <select id="category" name="category_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $products->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3 form-floating">
                                <input type="text" name="price" class="form-control floatingInput" id="price" value="{{number_format($products->price, 2 , ',' , '.' )}}">
                                <label class="form-label text-body-secondary ms-3"for="floatingInput">Preço</label>
                                @error('price')
                                <span class="text-danger">O formato do campo Preço é inválido.</span>
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

<script src="{{ asset('js/custom.js') }}"></script>
</x-app-layout>