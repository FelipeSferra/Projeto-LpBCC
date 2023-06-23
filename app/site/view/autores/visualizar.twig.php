{% extends "partials/body.twig.php" %}

{% block title %}Teste - Visualizar Autor{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Visualizar Autor</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}autores/excluir/{{autorId}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>

<hr>


<div class="row">
    <div class="col-md-12 mt-3">
        <label for="txtAut">Autor</label>
        <input type="hidden" value="{{autorId}}" id="txtId">
        <input type="text" id="txtAut" name="txtAut" class="form-control" placeholder="Nome do Autor" value="{{autor.nome}}" readonly>
    </div>
</div>
<div class="row mt-4">
    <div class="text-end">
        <a href="{{BASE}}autores/" class="btn btn-success me-md-2" role="button"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
    </div>
</div>
<script src="{{BASE}}js/autores.js"></script>
{% endblock %}