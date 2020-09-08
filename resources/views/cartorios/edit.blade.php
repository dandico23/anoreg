@extends('layouts.app')
@section('title', 'Editar um Cartório - ' . $cartorio->nome)

@section('content')
<div class="container">
    <h1 class="mb-3">Editar Cartório - {{$cartorio->nome}}</h1>
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{action('CartoriosController@update', $id)}}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$cartorio->nome}}" placeholder="Digite o Nome do Cartório..." required>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="razao">Razão Social</label>
                <input type="text" class="form-control" id="razao" name="razao" value="{{$cartorio->razao}}" placeholder="Digite o Razão Social do Cartório..." required>
            </div>
            <div class="col">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" id="documento" name="documento" minlength="14" maxlength="14" value="{{$cartorio->documento}}" placeholder="Documento">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep"  value="{{$cartorio->cep}}" placeholder="Digite o CEP do Cartório..." required>
            </div>
            <div class="col">
                <label for="razao">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="{{$cartorio->endereco}}" placeholder="Digite o Endereço do cartório">
            </div>
        </div>

        <div class="form-row">
            <div class="col-sm">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="{{$cartorio->bairro}}" placeholder="Digite o Bairro do Cartório..." required>
            </div>
            <div class="col-sm">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="{{$cartorio->cidade}}" placeholder="Digite o Cidade do Cartório..." required>
            </div>
            <div class="col-sm">
                <label for="uf">UF</label>
                <select class="form-control" name="uf" id="uf">
                <option selected value="{{$cartorio->uf}}""> {{$cartorio->uf}}</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="col-sm">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{$cartorio->telefone}}" placeholder="Digite o Telefone do Cartório...">
            </div>
            <div class="col-sm">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$cartorio->email}}" placeholder="Digite o E-mail do Cartório..." required>
            </div>
             <div class="col-sm">
                <label for="tabeliao">Tabelião</label>
                <input type="text" class="form-control" id="tabeliao" name="tabeliao" value="{{$cartorio->tabeliao}}" placeholder="Digite o Tabelião do Cartório..." required>
            </div>         
        </div>
        <div class="form-row">
            <div class="col-xs-6 col-sm-3">
                <label for="ativo">Ativo</label>
                <select class="form-control" name="ativo" id="ativo" required>
                    <option value="sim" @if($cartorio->ativo)selected @endif>Sim</option>
                    <option value="nao" @if(!$cartorio->ativo)selected @endif>Não</option>
                </select>
            </div> 
        </div>

{{--         <div class="form-check">
                <input type="checkbox" id="ativo" name="ativo" @if($cartorio->ativo)selected @endif>
                <input type="checkbox" id="ativo" name="ativo"@if(!$cartorio->ativo)selected @endif>
            @endif
            <label for="ativo">Ativo</label>

        </div> --}}
  

        <button type="submit" class="btn btn-primary mt-5">Editar Cartório</button>
    </form>
</div>
@endsection