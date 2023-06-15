{% extends "partials/body.twig.php" %}

{% block title %}Teste - Nova Editora{% endblock %}

{% block body %}
<br>
<h1>Nova Editora</h1>

<form action="" onsubmit="" method="post">
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="txtNome">Nome</label>
            <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome Aqui">
        </div>
        <div class="col-md-3 mt-3">
            <label for="txtEnd">Endereço</label>
            <input type="text" id="txtEnd" name="txtEnd" class="form-control" placeholder="Endereço Aqui">
        </div>
        <div class="col-md-3 mt-3">
            <label for="txtCidade">Cidade</label>
            <input type="text" id="txtCidade" name="txtCidade" class="form-control" placeholder="Cidade Aqui">
        </div>
    </div>
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}generos/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i>Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i>Adicionar</button>
        </div>
    </div>
</form>
{% endblock %}