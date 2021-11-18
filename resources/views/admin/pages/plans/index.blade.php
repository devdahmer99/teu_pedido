@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<ol class="breadcrumb mb-3">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
</ol>

    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i></a></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
               @csrf
               <div class="form-group">
                   <label>
                       <input type="text" name="filter" placeholder="Pesquise pelo plano" class="form-control" value="{{ $filters['filter'] ?? '' }}">
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
                        <th>Preço</th>
                        <th style="width:350px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td style="width:10px;">
                                <a href="{{ route('details.plans.index', $plan->url) }}" class="btn btn-primary">Detalhes</a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Visualizar</a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="fa-address-book"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!!  $plans->appends($filters)->links() !!}
            @else
            {!!  $plans->links() !!}
            @endif
        </div>
    </div>
@endsection
