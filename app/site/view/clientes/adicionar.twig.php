{% extends "partials/body.twig.php" %}

{% block title %}Teste - Novo Cliente{% endblock %}

{% block body %}
<br>
<h1>Novo Cliente</h1>

<hr>

<form action="{{BASE}}clientes/inserir" onsubmit="return validar(false);" method="post">
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="txtNome">Nome</label>
            <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome Aqui">
        </div>
        <div class="col-md-2 mt-3">
            <label for="nmCEP">CEP</label>
            <input type="number" id="nmCEP" name="nmCEP" class="form-control" placeholder="CEP aqui">
        </div>
        <div class="col-md-2 mt-3">
            <label for="nmNum">Número</label>
            <input type="number" id="nmNum" name="nmNum" class="form-control" placeholder="Número Aqui">
        </div>
        <div class="col-md-2 mt-3">
            <label for="nmQtde">Livros Emprestados</label>
            <input type="number" id="nmQtde" name="nmQtde" class="form-control" placeholder="Quantidade de emprestimos Aqui" value="0">
        </div>
    </div>
    
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}clientes/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Adicionar</button>
        </div>
    </div>
</form>
<script src="{{BASE}}js/clientes.js"></script>
{% endblock %}