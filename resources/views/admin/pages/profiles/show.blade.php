@extends('adminlte::page')

@section('title', "Detalhes do Perfil {{ $profile->name }}")

@section('content_header')
    <h1>Detalhes do Perfil <b>{{ $profile->name }}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $profile->description }}
                </li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3 mr-3">Remover o Perfil {{$profile->name}}</button>
            </form>
        </div>
    </div>
@endsection
