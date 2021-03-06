@extends('adminlte::page')

@section('title', "Permissões do perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>

    <h1>Permissões do perfil <strong>{{ $profile->name }}</strong></h1>
        <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">Adicionar Nova Permissão</a>
@endsection
@include('admin.includes.alerts')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:50px;">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            {{ $permission->name }}
                        </td>
                        <td style="width:10px;">
                            <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">Desvincular</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!!  $permissions->appends($filters)->links() !!}
            @else
                {!!  $permissions->links() !!}
            @endif
        </div>
    </div>
@endsection

