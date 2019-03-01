@extends('index')

@section('content')
    
<form class="form" role="form" autocomplete="off" id="updateProductsForm" novalidate="" method="">

        <input type="hidden" id="idProduct" name="idProduct" value="{{ $product->id }}">

        <div class="form-group">
            <label for="name">Nome do produto</label>
        <input id="name" class="form-control input" type="text" placeholder="Nome do produto" name="name" required value="{{ $product->name }}">
            <div class="invalid-feedback">Produto é obrigatório!</div>
        </div>

        <div class="form-group">
            <label for="price">Preço do produto</label>
            <input id="price" class="form-control input" type="text" placeholder="Preço do produto" name="price" value="{{ $product->price }}" required>
            <div class="invalid-feedback">Preço do produto é obrigatório!</div>
        </div>

        <div class="col-12 col-md-5">
            <button type="button" class="btn float-right btn-block" id="updateProduct">Atualizar</button>
        </div>

    </form>
@endsection