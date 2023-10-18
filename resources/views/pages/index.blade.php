@extends('layout.app')

@section('tittle','Catálogo de Produtos')

@section('content')

    <form id="newProduct" method="post" action="{{route('addProduct')}}">
        @csrf
        <div class="card card-body">
            <h5 class="card-title ">Adicionar Produto</h5>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <x-input name="name" id="product_name" label="Nome" required="true"
                             type="text" value=""/>
                </div>
                <div class="col-md-3 col-sm-6">
                    <x-input name="price" id="price_product" label="Preço" required="true"
                             type="number" value=""/>
                </div>
                <div class="col-md-3 col-sm-6">
                    <x-input name="amount" id="amount_product" label="Quantidade" required="true"
                             type="number" value=""/>
                </div>
                <div class="col-md-10 col-sm-12">
                    <x-input name="description" id="description_product" label="Descrição"
                             type="text" value=""/>
                </div>
                <div class="col-md-2 col-sm-6 d-flex" style="align-self: end;">
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-body"><h5 class="card-title "> Produtos</h5>
            <table class="table text-center table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Detalhes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{number_format($product->price, 2)}} R$</td>
                        <td>{{$product->amount}}</td>
                        <td>
                            <button id="product{{$product->id}}" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-id="{{$product->id}}"
                                    data-name="{{$product->name}}"
                                    data-price="{{$product->price}}"
                                    data-amount="{{$product->amount}}"
                                    data-description="{{$product->description}}"
                                    data-bs-target="#editProductModal">
                                Editar
                            </button>
                            <button id="delete{{$product->id}}" type="button" class="btn btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#excluirModal" data-name="{{$product->name}}"
                                    data-id="{{ $product->id }}">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
                @include('pages.partial.edit_product')
                @include('pages.partial.delete_product')
                </tbody>
            </table>
        </div>
    </div>

@endsection
