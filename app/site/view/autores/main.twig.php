{% extends "partials/body.twig.php" %}

{% block title %} Autores - Projeto {% endblock %}

{% block body %}
<br>
<h1>Autores</h1>

<a href="{{BASE}}autores/adicionar/" class="btn btn-outline-dark "><i class="fa-solid fa-plus"></i> Novo autor</a>

<hr>

<div class="overflow-auto">
    <table class="table table-light table-striped table-sm">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for autor in listaAutor %}
            <tr>
                <td>{{autor.id}}</td>
                <td>{{autor.nome}}</td>
                <td>
                    <div class="text-end">
                        <a href="{{BASE}}autores/editar/{{autor.id}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}