{% extends "partials/body.twig.php" %}

{% block title %}Teste - Editar Autor{% endblock %}

{% block body %}
<br>
<h1>Editar Autor</h1>

<form action="{{BASE}}autores/alterar/{{autorId}}" onsubmit="return validar(true);" method="post">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtAut">Autor</label>
            <input type="hidden" value="{{autorId}}" id="txtId">
            <input type="text" id="txtAut" name="txtAut" class="form-control" placeholder="Nome do Autor" value="{{autor.nome}}">
        </div>
    </div>
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}autores/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-warning me-md-2"><i class="fa-solid fa-check"></i> Editar</button>
        </div>
    </div>
</form>
<script src="{{BASE}}js/autores.js"></script>
{% endblock %}