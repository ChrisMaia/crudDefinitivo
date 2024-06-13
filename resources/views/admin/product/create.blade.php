<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">      
            {{ __('Criar Produtos') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-0">Adicionar Produtos</h1>
                    <hr />
                    @if (Session::has('error'))
                        <div >
                            {{ Session('error') }}
                        </div>
                    @endif

                    <p><a href="{{ route('adminProducts.index') }}" class="btn btn-primary">Voltar</a></p>

                    <form action="{{ route('adminProducts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Nome do Produto">
                                <label class="text-body-secondary ms-3"for="floatingInput">Nome do Produto</label>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="text" name="category" class="form-control" id="floatingInput" placeholder="Categoria">
                                <label class="text-body-secondary ms-3" for="floatingInput">Categoria</label>
                                @error('category')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating" x-data="{ price: '' }" >
                                <input type="text" name="price" class="form-control" id="floatingInput" placeholder="Preço" x-model="price" x-on:input="price = price.replace(/\D/g, '').replace(/(\d{2})$/, ',$1').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')">
                                <label class="text-body-secondary  ms-3"for="floatingInput">Preço</label>
                                @error('price')
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
    <!-- Alpine Plugins -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
 
 <!-- Alpine Core -->
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
 
</x-app-layout>
