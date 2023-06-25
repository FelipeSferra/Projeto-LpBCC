{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Alterar Cliente{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
    <h1>Alterar Cliente</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}clientes/excluir/{{clienteId}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>

<hr>

<form action="{{BASE}}clientes/alterar/{{clienteId}}" onsubmit="return validar(true);" method="post">
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="txtNome">Nome</label>
            <input type="hidden" value="{{clienteId}}">
            <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome Aqui" value="{{cliente.nome}}">
        </div>
        <div class="col-md-2 mt-3">
            <label for="nmCEP">CEP</label>
            <input type="number" id="nmCEP" name="nmCEP" class="form-control" placeholder="CEP aqui" value="{{cliente.cep}}">
        </div>
        <div class="col-md-2 mt-3">
            <label for="nmNum">Número</label>
            <input type="number" id="nmNum" name="nmNum" class="form-control" placeholder="Número Aqui" value="{{cliente.numero}}">
        </div>
        <div class="col-md-2 mt-3">
            <label for="nmQtde">Livros Emprestados</label>
            <input type="number" id="nmQtde" name="nmQtde" class="form-control" placeholder="Quantidade de emprestimos Aqui" value="{{cliente.qtde}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 mt-3">
            <label for="txtEnd">Endereço</label>
            <input type="text" id="txtEnd" name="txtEnd" class="form-control" placeholder="Endereço Aqui" value="{{cliente.endereco}}">
        </div>
        <div class="col-md-3 mt-3">
            <label for="txtCidade">Cidade</label>
            <input type="text" id="txtCidade" name="txtCidade" class="form-control" value="{{cliente.cidade}}" readonly>
        </div>
        <div class="col-md-2 mt-3">
            <label for="txtUF">UF</label>
            <input type="text" id="txtUF" name="txtUF" class="form-control" value="{{cliente.uf}}" readonly>
        </div>
    </div>

    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}clientes/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Editar</button>
        </div>
    </div>
</form>
<script src="{{BASE}}js/clientes.js"></script>
{% endblock %}