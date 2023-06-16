{% extends "partials/body.twig.php" %}

{% block title %}Teste - Editar Editora{% endblock %}

{% block body %}
<br>
<h1>Editar Editora</h1>

<form action="{{BASE}}editoras/alterar/{{editoraId}}" onsubmit="return validar(true);" method="post">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtEdt">Editora</label>
            <input type="hidden" value="{{editoraId}}" id="txtId">
            <input type="text" id="txtEdt" name="txtEdt" class="form-control" placeholder="Editora Aqui" value="{{editora.nome}}">
        </div>
    </div>
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}editoras/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Editar</button>
        </div>
    </div>
</form>
<script src="{{BASE}}js/editoras.js"></script>
{% endblock %}