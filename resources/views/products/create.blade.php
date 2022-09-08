@extends('layouts.main')

@section('title', 'Adicionar Produto')

@section('content')
    <div id="product-create-container" class="col-md-6 offset-md-3">
        <h1>Adicione um produto</h1>
        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do produto:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do produto">
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea class="form-control" id="description" name="description" placeholder="Descrição..."/></textarea>
            </div>

            <div class="form-group">
                <label for="categories">Selecione tipo de produto:</label>
                <div class="form-group">
                    <input type="checkbox" name="categories[]" value="Crochê"> Crochê
                </div>
                <div class="form-group">
                    <input type="checkbox" name="categories[]" value="Feltro"> Feltro
                </div>
                <div class="form-group">
                    <input type="checkbox" name="categories[]" value="E.V.A."> E.V.A.
                </div>
                <div class="form-group">
                    <input type="checkbox" name="categories[]" value="Bordado"> Bordado
                </div>
            </div>

            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Preço do produto">
            </div>

            <input type="submit" class="btn btn-primary" value="Adicionar">
        </form>
    </div>
@endsection