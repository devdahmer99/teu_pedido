@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.plans', $profile->id) }}" class="active">Planos</a></li>
    </ol>

    <h1>Planos do Perfil <strong>{{ $profile->name }}</strong></h1>
@endsection
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
                @foreach ($plans as $plan)
                    <tr>
                        <td>
                            {{ $plan->name }}
                        </td>
                        <td style="width:10px;">
                            <a href="{{ route('plans.profiles.attach', [$plan->id, $profile->id]) }}" class="btn btn-danger">Desvincular</a>
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

