{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Visualizar Pedido{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Pedido Número - ID</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mt-3">
        <label for="txtLivro">Livro</label>
        {% for livro in listaLivros %}
            {% if livro.id == pedido.livroId %}
            <input type="text" id="txtLivro" name="txtLivro" class="form-control" value="{{livro.titulo}}" readonly>
            {% endif %}
        {% endfor %}
    </div>
    <div class="col-md-6 mt-3">
        <label for="slCliente">Clientes</label>
        {% for cliente in listaClientes %}
            {% if cliente.id == pedido.clienteId %}
            <input type="text" id="slCliente" name="slCliente" class="form-control" value="{{cliente.nome}}" readonly>
            {% endif %}
        {% endfor %}
    </div>
</div>

<div class="row">
    <div class="col-md-6 mt-3">
        <label for="txtDataEmp">Data de emprestimo</label>
        <input type="text" class="form-control" id="txtDataEmp" name="txtDataEmp" value="{{pedido.data_emprestimo | date('d/m/Y')}}" readonly>
    </div>
    <div class="col-md-6 mt-3">
        <label for="txtDataDev">Data de devolução</label>
        <input type="text" class="form-control" id="txtDataDev" name="txtDataDev" value="{{pedido.data_devolucao | date('d/m/Y')}}" readonly>
    </div>
</div>

<div class="row mt-4">
    <div id="dvAlert">
        <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
    </div>
    <div class="text-end">
        <a href="{{BASE}}pedidos/" class="btn btn-success me-md-2" role="button"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
        <a href="{{BASE}}pedidos/devolver/{{pedido.id}}" class="btn btn-info me-md-2" role="button"><i class="fa-solid fa-hand-holding-box"></i> Devolver</a>
    </div>
</div>


<script src="{{BASE}}js/pedidos.js"></script>
{% endblock %}