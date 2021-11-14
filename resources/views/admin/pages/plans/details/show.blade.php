@extends('adminlte::page')

@section('title', "Detalhes do detalhe {$detail->name}")

@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plans.index', $plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plans.edit', [$plan->url, $detail->id]) }}" class="active">Detalhes</a></li>
    </ol>

    <h1>Detalhes do detalhe {{ $detail->name }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
           <ul>
               <li>
                   <stron>Nome: </stron> {{ $detail->name }}
               </li>
           </ul>
        </div>
        <div class="card-footer">
            <form method="POST" action="{{ route('details.plans.destroy', [$plan->url, $detail->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o detalhe {{ $detail->name }}, do plano {{ $plan->name }}</button>
            </form>
        </div>
    </div>
@endsection
