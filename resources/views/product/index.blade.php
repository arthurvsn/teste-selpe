@extends('index')

@section('content')

<h3>Produtos cadastrados</h3>

<table class="table">

    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($products as $product)
            <tr>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                <a href="produto/editar/{{ $product->id }}"><button class="btn">Editar</button></a> / <button class="btn" onclick="deleteProduct({{ $product->id }})">Excluir</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="produto/novo">
    <button type="button" class="btn float-right btn-block">Novo Produto</button>
</a>
    
@endsection