{% extends "partials/body.twig.php" %}

{% block title %}Teste - Cadastrar Login{% endblock %}

{% block body %}
<br>
<h1>Cadastrar Login</h1>

<hr>

<form action="{{BASE}}login/inserir" onsubmit="return validar(false);" method="post">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtGen">Usuário</label>
            <input type="text" id="txtUser" name="txtUser" class="form-control" placeholder="Usuário">
            <label for="txtGen">Senha</label>
            <input type="text" id="txtSen" name="txtSen" class="form-control" placeholder="Senha">
        </div>
    </div>
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}generos/" class="btn btn-danger me-md-2"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Adicionar</button>
        </div>
    </div>
</form>
<script src="{{BASE}}js/generos.js"></script>
{% endblock %}