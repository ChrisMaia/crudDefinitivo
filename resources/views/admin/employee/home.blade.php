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
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Data de Nascimento</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $employee->name }}</td>
                                <td class="align-middle">{{ date('d/m/Y', strtotime($employee->data_nascimento)) }}</td>
                                <td class="align-middle">{{ $employee->cpf }}</td>
                                <td class="align-middle">{{ $employee->telefone }}</td>
                                <td class="align-middle">{{ $employee->email }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <spam class="p-2 ">
                                            <a href="{{ route('adminEmployees.edit', ['id'=>$employee->id]) }}" type="button" class="btn btn-warning fs-6">Editar</a>
                                        </spam> 
                                        <spam class="p-2">
                                            <a href="{{ route('adminEmployees.destroy', ['id'=>$employee->id]) }}" onclick="return confirm('Você tem certeza?')" type="button" class="btn btn-danger fs-6">Deletar</a>
                                        </spam>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="7">Funcionários não encontrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>