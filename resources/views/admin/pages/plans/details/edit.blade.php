@extends('adminlte::page')

@section('title', "Editar o detalhe {$detail->name}")

@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plans.index', $plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plans.edit', [$plan->url, $detail->id]) }}" class="active">Novo</a></li>
    </ol>

    <h1>Editar o detalhe {{ $detail->name }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plans.update', [$plan->url, $detail->id]) }}" method="POST">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection

