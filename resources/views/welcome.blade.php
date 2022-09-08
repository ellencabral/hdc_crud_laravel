@extends('layouts.main')

@section('title', 'Virtual Artesanato')

@section('content') 

    <div id="search-container" class="col-md-12">
        <h1>Busque um produto</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..."/>
        </form>
    </div>
    <div id="products-container" class="col-md-12">
        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Lista de produtos</h2>
            <p class="subtitle">Veja todos os seus produtos</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($products as $product)
                <div class="card col-md-3">
                    <img src="/img/products/{{ $product->image }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <p class="card-price">{{ 'R$ '.number_format($product->price, 2, ',', '.') }}</p>
                        <h5 class="card-name">{{ $product->name }}</h5>
                        <a href="/products/{{ $product->id }}" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            @endforeach
            @if(count($products) == 0 && $search)
                <p>Não foi possível encontrar nenhum produto com {{ $search }}! <a href="/">Ver todos</a>
            @elseif(count($products) == 0)
                <p>Não há produtos disponíveis</p>
            @endif
        </div>
    </div>    
@endsection