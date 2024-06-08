<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">      
            {{ __('Editar funcionário') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-0">Editar funcionário</h1>
                    <hr />
                    <form action="{{ route('adminEmployees.update', $employees->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nome do Funcionário" value="{{$employees->name}}">
                                <label class="text-body-secondary ms-3"for="floatingInput">Nome do Funcionário</label>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="date" name="data_nascimento" class="form-control" id="floatingInput" placeholder="Data de Nacimento" value="{{$employees->data_nascimento}}">
                                <label class="text-body-secondary ms-3" for="floatingInput">Data de Nacimento</label>
                                @error('data_nascimento')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="text" name="cpf" class="form-control floatingInput" id="cpf" placeholder="000.000.000-00" maxlength="14" value="{{$employees->cpf}}">
                                <label class="text-body-secondary  ms-3"for="floatingInput">CPF</label>
                                @error('cpf')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="text" name="telefone" class="form-control" id="floatingInput" placeholder="Telefone" value="{{$employees->telefone}}">
                                <label class="text-body-secondary ms-3" for="floatingInput">Telefone</label>
                                @error('telefone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-floating">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email" value="{{$employees->email}}">
                                <label class="text-body-secondary ms-3" for="floatingInput">Email</label>
                                @error('email')
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