{% extends "partials/body.twig.php" %}

{% block title %} Autores - Projeto {% endblock %}

{% block body %}
<br><h1>Autores</h1>

<a href="{{BASE}}autores/adicionar/" class="btn btn-outline-dark ">Novo autor</a>

<hr>

<div class="overflow-auto">
    <table class="table table-dark table-striped">
        <tr>
            <th>#ID</th>
            <th>Nome</th>
        </tr>
    </table>
</div>

{% endblock %}