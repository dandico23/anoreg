@extends('layouts.app')
@section('title', $cartorio->nome)

@section('content')
    <div class="container">
        <h1>Visualizar detalhes</h1>
        <div class="card border-light">
            <div class="card-header">
                <h4>Cartorio - {{$cartorio->nome}}</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li>
                        <h5><strong>Razão Social: </strong>{{$cartorio->razao}}</h5>
                    </li>
                    <li>
                        <h5><strong>Documento: </strong>{{$cartorio->documento}}</h5>
                    </li>
                    <li>
                        <h5><strong>CEP: </strong>{{$cartorio->cep}}<strong> Endereço: </strong>{{$cartorio->endereco}}<strong> Bairro: </strong>{{$cartorio->bairro}}</h5>
                    </li>
                    <li>
                        <h5><strong> Cidade: </strong>{{$cartorio->cidade}} <strong> UF: </strong>{{$cartorio->uf}}</h5>
                    </li>
                    <li>
                        <h5><strong>Telefone: </strong>{{$cartorio->telefone}}<strong> E-mail: </strong>{{$cartorio->email}}</h5>
                    </li>
                    <li>
                        <h5><strong>Tabelião: </strong>{{$cartorio->tabeliao}}</h5>
                    </li>

                </ul>
                <a href="{{URL::to('cartorios')}}/{{$cartorio->id}}/edit" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
@endsection