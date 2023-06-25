{% extends "partials/body.twig.php" %}

{% block title %} Brisa Livros - Gêneros {% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Gêneros</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}generos/adicionar/" class="btn btn-outline-dark "><i class="fa-solid fa-plus"></i> Novo gênero</a>
        </div>
    </div>
</div>

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
                        <a href="{{BASE}}generos/visualizar/{{genero.id}}" class="btn btn-info btn-sm me-md-2"><i class="fa-solid fa-magnifying-glass"></i> Visualizar</a>
                        <a href="{{BASE}}generos/editar/{{genero.id}}" class="btn btn-warning btn-sm me-md-2"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}