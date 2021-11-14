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

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <div class="form-group">
                    <label>
                        <input type="text" name="filter" placeholder="Pesquise pela permissão" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                    </label>
                </div>
                <button type="submit" class="btn btn-dark ml-2"><i class="fas fa-filter"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:350px;">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            {{ $permission->name }}
                        </td>
                        <td style="width:10px;">
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>
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

