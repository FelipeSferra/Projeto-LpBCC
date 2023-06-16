{% extends "partials/body.twig.php" %}

{% block title %} Gêneros - Projeto {% endblock %}

{% block body %}
<br>
<h1>Gêneros</h1>

<a href="{{BASE}}generos/adicionar/" class="btn btn-outline-dark "><i class="fa-solid fa-plus"></i> Novo gênero</a>

<hr>

<div class="overflow-auto">
    <table class="table table-light table-striped table-sm">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Gênero</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for genero in listaGenero %}
            <tr>
                <td>{{genero.id}}</td>
                <td>{{genero.descricao}}</td>
                <td>
                    <div class="text-end">
                        <a href="{{BASE}}generos/editar/{{genero.id}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}