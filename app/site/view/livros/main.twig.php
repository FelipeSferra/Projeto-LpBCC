{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Livros{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Livros</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}livros/adicionar/" class="btn btn-outline-dark "><i class="fa-solid fa-plus"></i> Novo Livro</a>
        </div>
    </div>
</div>

<hr>

<div class="overflow-auto">
    <table class="table table-light table-striped table-sm">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Titulo</th>
                <th>Slug</th>
                <th>Status</th>
                <th>QTDE</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for livro in listaLivro %}
            <tr>
                <td>{{livro.id}}</td>
                <td>{{livro.titulo}}</td>
                <td>{{livro.slug}}</td>
                <td>{{livro.status}}</td>
                <td>{{livro.qtde}}</td>
                <td>
                    <div class="text-end">
                        <a href="{{BASE}}livros/editar/{{livro.id}}" class="btn btn-warning btn-sm me-md-2"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}