{% extends "partials/body.twig.php" %}

{% block title %}Teste - Editar Autor{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Editar Senha</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}login/excluir/{{loginId}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>

<hr>

<form action="{{BASE}}login/alterar/{{loginId}}" onsubmit="return validar(true);" method="post" id="frmEditarLogin" name="frmEditarLogin">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtSen">Senha</label>
            <input type="hidden" value="{{loginId}}" id="txtId">
            <input type="text" id="txtSen" name="txtSen" class="form-control" placeholder="Senha" value="{{login.senha}}">
        </div>
    </div>
    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}login/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-warning me-md-2" id="submitEditarLogin" name="submitEditarLogin"><i class="fa-solid fa-check"></i> Editar</button>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{BASE}}js/login.js"></script>
{% endblock %}