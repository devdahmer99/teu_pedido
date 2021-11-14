@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>

    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i></a></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <div class="form-group">
                    <label>
                        <input type="text" name="filter" placeholder="Pesquise pelo perfil" class="form-control" value="{{ $filters['filter'] ?? '' }}">
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
                @foreach ($profiles as $profile)
                    <tr>
                        <td>
                            {{ $profile->name }}
                        </td>
                        <td style="width:10px;">
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">Visualizar</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!!  $profiles->appends($filters)->links() !!}
            @else
                {!!  $profiles->links() !!}
            @endif
        </div>
    </div>
@endsection