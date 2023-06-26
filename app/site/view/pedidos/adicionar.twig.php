{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Emprestimo{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Gerar Pedido</h1>
    </div>
</div>
<form action="{{BASE}}pedidos/encomendar/{{livro.id}}" onsubmit="return validar(true);" method="post">
    <div class="row">
        <div class="col-md-6 mt-3">
            <input type="hidden" id="txtIdLivro" name="txtIdLivro" value="{{livro.id}}">
            <label for="txtLivro">Livro</label>
            <input type="text" id="txtLivro" name="txtLivro" class="form-control" value="{{livro.titulo}}" readonly>
        </div>
        <div class="col-md-6 mt-3">
            <label for="slCliente">Clientes</label>
            <select id="slCliente" name="slCliente" class="form-select">
                <option selected value="0">Selecione o cliente que vai receber o livro</option>
                {% for cliente in listaClientes %}
                <option value="{{cliente.id}}">{{cliente.nome}}</option>
                {% endfor %}
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Emprestar</button>
        </div>
    </div>
</form>

<script src="{{BASE}}js/pedidos.js"></script>
{% endblock %}