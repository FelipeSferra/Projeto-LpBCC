{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Visualizar Editora{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Visualizar Editora</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}editoras/excluir/{{editoraId}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12 mt-3">
        <label for="txtEdt">Editora</label>
        <input type="hidden" value="{{editoraId}}" id="txtId">
        <input type="text" id="txtEdt" name="txtEdt" class="form-control" placeholder="Editora Aqui" value="{{editora.nome}}" readonly>
    </div>
</div>
<div class="row mt-4">
    <div class="text-end">
        <a href="{{BASE}}editoras/" class="btn btn-success me-md-2" role="button"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
    </div>
</div>

{% endblock %}