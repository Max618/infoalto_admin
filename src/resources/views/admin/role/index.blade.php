@extends('layout.dashboard')

@section('title',"Gerenciar Funções")

@section('content')
<h3 class="page-title">Gerenciar Funções</h3>
<div class="row">
    <div class="col-md-12">
        <!-- TABLE HOVER -->
        <div class="panel">
            <div class="panel-heading">
                <a href="{{ route('role.create') }}" class="btn btn-primary btn-lg">Criar Função</a>
            </div>
            <div class="panel-body table-responsive">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    <a href="{{ route('role.edit', $role) }}" class="btn btn-warning">Editar</a>
                                <a href="{{ route('role.destroy', $role) }}" onclick="event.preventDefault(); confirm('Deseja excluir a função {{$role->name}}?') ? document.getElementById('delete-{{$role->id}}').submit() : ''" class="btn btn-danger">Excluir</a>
                                 <form id="delete-{{$role->id}}" action="{{ route('role.destroy', $role)  }}" method="POST" style="display: none;">
                                     @csrf
                                     @method("DELETE")
                                 </form>  
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