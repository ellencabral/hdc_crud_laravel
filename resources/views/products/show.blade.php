@extends('layouts.main')

@section('title', $product->name)

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/products/{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}"/>
            </div>
            
            <div id="info-container" class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="card-date">Adicionado em {{ date('d/m/Y',strtotime($product->created_at)) }}</p>
                <p class="products-price">{{ 'R$ '.number_format($product->price, 2, ',', '.') }}</p>

                <a href="#" class="btn btn-primary" id="product-submit">Comprar</a>

                <h3>Vendedor:</h3>
                <p class="product-owner">{{ $productOwner['name'] }}</p>

                <h3>Categorias:</h3>
                <ul id="categories-list">
                    @foreach($product->categories as $category)
                        <li>{{ $category }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o produto:</h3>
                <p class="product-description">{{ $product->description }}</p>
            </div>
        </div>
    </div>
@endsection