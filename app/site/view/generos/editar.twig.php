{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Editar Gênero{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Editar Gênero</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}generos/excluir/{{generoId}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>

<hr>

<form action="{{BASE}}generos/alterar/{{generoId}}" onsubmit="return validar(true);" method="post">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtGen">Gênero</label>
            <input type="hidden" value="{{generoId}}" id="txtId">
            <input type="text" id="txtGen" name="txtGen" class="form-control" placeholder="Gênero Aqui" value="{{genero.descricao}}">
        </div>
    </div>
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}generos/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Editar</button>
        </div>
    </div>
</form>
<script src="{{BASE}}js/generos.js"></script>
{% endblock %}