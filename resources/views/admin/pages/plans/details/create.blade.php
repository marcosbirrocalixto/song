@extends('adminlte::page')

@section('title', "Adicionar Novo Detalhe ao Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.create', $plan->url) }}" class="active">Novo Detalhe</a></li>
    </ol>

    <h1>Adicionar Novo Detalhe ao Plano {{ $plan->name }} <a href="{{ route('plans.create')}}"></a>  </h1>
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <form action="{{ route('details.plan.store', $plan->url)}}" class="form" method="post">
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection
