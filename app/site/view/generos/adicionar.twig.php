{% extends "partials/body.twig.php" %}

{% block title %}Teste - Novo Gênero{% endblock %}

{% block body %}
<br>
<h1>Novo Gênero</h1>

<form action="{{BASE}}generos/inserir" onsubmit="return validar(false);" method="post">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtGen">Gênero</label>
            <input type="text" id="txtGen" name="txtGen" class="form-control" placeholder="Gênero Aqui" minlength="3" maxlength="45">
        </div>
    </div>
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}generos/" class="btn btn-danger me-md-2" role="button">Cancelar</a>
            <input type="submit" value="Adicionar" class="btn btn-success me-md-2">
        </div>
    </div>
</form>
<script src="{{BASE}}js/generos.js"></script>
{% endblock %}