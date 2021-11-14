@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
    <h1>Cadastrar Novo Perfil</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="POST">


                @include('admin.pages.profiles.__partials.form')
            </form>
        </div>
    </div>
@endsection
