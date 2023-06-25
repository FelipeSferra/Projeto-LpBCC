{% extends "partials/body.twig.php" %}

{% block title %}Teste - Realizar login{% endblock %}

{% block body %}
<br>
<h1>Realizar Login</h1>

<hr>

<form action="{{BASE}}login/logar" onsubmit="return validar(false);" method="post">
    <div class="row">
        <div class="col-md-6 mt-3">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required><br><br>
        </div>
        <div class="col-md-3 mt-3">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required><br><br>
        </div>
        
    </div>

    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}login/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Logar</button>
        </div>
    </div>
</form>
{% endblock %}