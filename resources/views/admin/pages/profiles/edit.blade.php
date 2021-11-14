@extends('adminlte::page')

@section('title', "Editar o Perfil {$profile->name}")

@section('content_header')
    <h1>Editar Plano {{ $profile->name }} </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.pages.profiles.__partials.form')
            </form>
        </div>
    </div>
@endsection
