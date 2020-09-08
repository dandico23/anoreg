@extends('layouts.app')
@section('title', 'Lista de Cartórios')
@section('content')
    <div class="container">
        <h1>Cartórios</h1>
        @if($message = Session::get('failedMessage'))
        <div class="alert alert-danger alert-dismissible">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                    <form method="POST" action="{{url('cartorios/busca')}}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="busca" name="busca" placeholder="Buscars por Nome, Razão ou Documento...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary">Buscar</button>
                                </div>
                        </div>
                    </form>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Documento</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ativo</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartorios as $cartorio)
                    <tr class="@if(!$cartorio->ativo)table-secondary @endif">
                        <th scope="row">{{$cartorio->id}}</th>
                        <td style="text-overflow: ellipsis;width: 150px;overflow: hidden;">{{$cartorio->nome}}</td>
                         <td>{{$cartorio->documento}}</td>
                        <td>{{$cartorio->telefone}}</td>
                        <td>@if($cartorio->ativo) Sim @else Não @endif</td>
                        <td>
                            <a href="{{URL::to('cartorios')}}/{{$cartorio->id}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Visualizar</a>
                            <a href="{{URL::to('cartorios')}}/{{$cartorio->id}}/edit" class="btn btn-info btn-sm" role="button" aria-pressed="true">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$cartorios->links()}}
    </div>
@endsection