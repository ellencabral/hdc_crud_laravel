@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Produtos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-products-container">
    @if(count($products) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td scropt="row">{{ $loop->index +1 }}</td>
                <td scropt="row"><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
                <td scropt="row">{{ 'R$ '.number_format($product->price, 2, ',', '.') }}</td>
                <td scropt="row"><a href="/products/edit/{{ $product->id }}" class="btn btn-info edit-btn">✏️</a></td>
                <td scropt="row">
                    <form action="/products/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não tem produtos, <a href="/products/create">Adicionar produto</a></p>
    @endif
</div>

@endsection