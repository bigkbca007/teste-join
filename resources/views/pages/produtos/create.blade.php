@extends('layouts.app')

@section('content')
<!-- Máscara -->

<h2 class="head-page">{{ is_null($produto) ? 'Adicionar' : 'Editar' }} Produto</h2>

<div class="style-content">
    <form method="POST" action="{{ $action }}" class="style-form">
        @csrf

        <input type="hidden" name="id_produto" value="{{ is_null($produto) ? 0 : $produto->id_produto }}">
        <div class="mb-3">
            <label for="id_categoria_produto" class="form-label">Categoria</label>
            <select class="form-control" name="id_categoria_produto" id="id_categoria_produto">
                <option value="">Selecione</option>
                @foreach($categorias as $categoria)
                <option {{ !is_null($produto) && ($categoria->id_categoria_produto == $produto->id_categoria_produto)? 'selected' : '' }} value="{{ $categoria->id_categoria_produto }}">{{ $categoria->nome_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nome_produto" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome_produto" id="nome_produto" placeholder="Nome do produto" value="{{ is_null($produto) ? '' : $produto->nome_produto }}">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">R$</span>
            <input type="text" class="form-control" name="valor_produto" id="valor_produto" placeholder="Valor do Produto" data-inputmask="'alias': 'currency'" value="{{ is_null($produto) ? '' : $produto->valor_produto }}">
        </div>
        <button type="submit" class="btn btn-outline-primary">
            @if(is_null($produto))
                Adicionar
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            @else
                Alterar
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            @endif
        </button>
    </form>
</div>

<script src="/js/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#valor_produto").maskMoney({allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    });
</script>

@endsection