<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">      
            {{ __('Página de administração de produtos') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista de Produtos</h1>
                        <a href="{{ route('adminProducts.create') }}" class="btn btn-primary">Adicionar produto</a>
                    </div>
                    <hr />
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $product->title }}</td>
                                <td class="align-middle">{{ $product->category }}</td>
                                <td class="align-middle">R$ {{ number_format($product->price, 2 , ',' , '.' )}}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <spam class="p-2 ">
                                            <a href="{{ route('adminProducts.edit', ['id'=>$product->id]) }}" type="button" class="btn btn-warning fs-6">Editar</a>
                                        </spam> 
                                        <spam class="p-2">
                                            <a href="{{ route('adminProducts.destroy', ['id'=>$product->id]) }}" onclick="return confirm('Você tem certeza?')" type="button" class="btn btn-danger fs-6">Deletar</a>
                                        </spam>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Produto não encontrado</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>