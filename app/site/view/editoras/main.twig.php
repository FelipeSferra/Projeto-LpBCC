{% extends "partials/body.twig.php" %}

{% block title %} Editoras - Projeto {% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Editoras</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}editoras/adicionar/" class="btn btn-outline-dark "><i class="fa-solid fa-plus"></i> Nova editora</a>
        </div>
    </div>
</div>

<hr>

<div class="overflow-auto">
    <table class="table table-light table-striped table-sm">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Editora</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for editora in listaEditora %}
            <tr>
                <td>{{editora.id}}</td>
                <td>{{editora.nome}}</td>
                <td>
                    <div class="text-end">
                        <a href="{{BASE}}editoras/visualizar/{{editora.id}}" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i> Visualizar</a>
                        <a href="{{BASE}}editoras/editar/{{editora.id}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}