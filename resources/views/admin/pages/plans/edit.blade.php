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
               <div class="form-group">
                   <label class="label-control">Nome:</label>
                   <input type="text" name="name" class="form-control" placeholder="Nome:">
               </div>
               <div class="form-group">
                <label class="label-control">Preço:</label>
                <input type="text" name="price" class="form-control" placeholder="Preço:">
            </div>
            <div class="form-group">
                <label class="label-control">Descrição:</label>
                <input type="text" name="description" class="form-control" placeholder="Descrição:">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
           </form>
        </div>
    </div>
@endsection
