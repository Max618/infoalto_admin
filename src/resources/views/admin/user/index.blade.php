@extends('layout.dashboard')

@section('title',"Gerenciar Usuários")

@section('content')
<style>
    #myTable th {
        /*text-align: center*/
    }
</style>
<h3 class="page-title">Gerenciar Usuários</h3>
<div class="row">
    <div class="col-md-12">
        <!-- TABLE HOVER -->
        <div class="panel">
            <div class="panel-heading">
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-lg">Criar Usuário</a>
            </div>
            <div class="panel-body table-responsive">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Funções</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role_formated }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-warning">Editar</a>
                                    <a href="{{ route('user.destroy', $user) }}" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="4">Sem Registros</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END TABLE HOVER -->
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        let table = $("#myTable").DataTable({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json" },
            columnDefs: [
                {
                    targets: -1,
                    className: 'dt-head-center'
                }
            ]
        });
    });
</script>
@endsection