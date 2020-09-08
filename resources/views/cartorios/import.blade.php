@extends('layouts.app')
@section('title', 'Importar arquivo XML')

@section('content')
<div class="container">
    <h1 class="mb-3">Adicionar um novo Cartório</h1>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @elseif($message = Session::get('failedMessage'))
        <div class="alert alert-danger">
            {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="{{url('cartorios/import')}}">
        @csrf
        <div class="form-group mb-3">
            <label for="filexml">Arquivo Xml</label>
            <input type="file" class="form-control-file" id="filexml" name="filexml"  required>
        </div>
        <button type="submit" class="btn btn-primary">Importar Arquivo</button>
    </form>
</div>
@endsection