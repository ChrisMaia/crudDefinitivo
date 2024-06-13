<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">      
            {{ __('Criar Funcionários') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-0">Adicionar Funcionários</h1>
                    <hr />
                    @if (Session::has('error'))
                        <div >
                            {{ Session('error') }}
                        </div>
                    @endif

                    <p><a href="{{ route('adminEmployees.index') }}" class="btn btn-primary">Voltar</a></p>

                    <form action="{{ route('adminEmployees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nome do Funcionário">
                                <label class="text-body-secondary ms-3"for="floatingInput">Nome do Funcionário</label>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="date" name="data_nascimento" class="form-control" id="floatingInput" placeholder="Data de Nacimento">
                                <label class="text-body-secondary ms-3" for="floatingInput">Data de Nacimento</label>
                                @error('data_nascimento')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating" x-data="{ cpf : ' ' }">
                                <input type="text" name="cpf" class="form-control floatingInput" id="cpf" x-mask="999.999.999-99">
                                <label class="text-body-secondary  ms-3"for="floatingInput">CPF</label>
                                @error('cpf')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating" x-data="{ telefone : ' ' }">
                                <input type="text" name="telefone" class="form-control" id="floatingInput" placeholder="Telefone" x-mask="(99) 99999-9999">
                                <label class="text-body-secondary ms-3" for="floatingInput">Telefone</label>
                                @error('telefone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
                                <label class="text-body-secondary ms-3" for="floatingInput">Email</label>
                                @error('email')
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
