{% extends "partials/body.twig.php" %}

{% block title %}Teste - Nova Editora{% endblock %}

{% block body %}
<br>
<h1>Nova Editora</h1>

<form action="" onsubmit="" method="post">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtEdt">Editora</label>
            <input type="text" id="txtEdt" name="txtEdt" class="form-control" placeholder="Editora Aqui">
        </div>
    </div>
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}editoras/" class="btn btn-danger me-md-2" role="button">Cancelar</a>
            <input type="submit" value="Adicionar" class="btn btn-success me-md-2">
        </div>
    </div>
</form>
{% endblock %}