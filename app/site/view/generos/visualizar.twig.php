{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Visualizar Gênero{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Visualizar Gênero</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}generos/excluir/{{generoId}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>

<hr>


<div class="row">
    <div class="col-md-12 mt-3">
        <label for="txtGen">Gênero</label>
        <input type="hidden" value="{{generoId}}" id="txtId">
        <input type="text" id="txtGen" name="txtGen" class="form-control" placeholder="Gênero Aqui" value="{{genero.descricao}}" readonly>
    </div>
</div>
<div class="row mt-4">
    <div class="text-end">
        <a href="{{BASE}}generos/" class="btn btn-success me-md-2" role="button"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
    </div>
</div>

{% endblock %}