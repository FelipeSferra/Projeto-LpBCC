{% extends "partials/body.twig.php" %}

{% block title %} Gêneros - Projeto {% endblock %}

{% block body %}
<br><h1>Gêneros</h1>

<a href="{{BASE}}generos/adicionar/" class="btn btn-outline-dark ">Novo gênero</a>

<hr>

<div class="overflow-auto">
    <table class="table table-dark table-striped">
        <tr>
            <th>#ID</th>
            <th>Gênero</th>
        </tr>
    </table>
</div>

{% endblock %}