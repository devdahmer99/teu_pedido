@extends('adminlte::page')

@section('title', "Editar o plano {$plan->name}")

@section('content_header')
    <h1>Editar Plano {{ $plan->name }} </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
           <form action="{{ route('plans.store') }}" class="form" method="POST">
               @csrf

               @include('admin.pages.plans._partials.form')
           </form>
        </div>
    </div>
@endsection
