{% extends "partials/body.twig.php" %}

{% block title %} Teste {% endblock %}

{% block body %}
<br>
<h1>Pesquisa</h1>

<p>Exibindo <span class="fw-bold">{{qtdeResultado}}</span> resultado(s) para o termo <span class="fw-bold">{{termo}}</span></p>

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
            {% for livro in livros %}
            <tr>
                <td>{{livro.id}}</td>
                <td>{{livro.titulo}}</td>
                <td>{{livro.slug}}</td>
                <td>{{livro.status}}</td>
                <td>{{livro.qtde}}</td>
                <td>
                    <div class="text-end">
                        <a href="{{BASE}}livros/visualizar/{{livro.id}}" class="btn btn-info btn-sm me-md-2"><i class="fa-solid fa-magnifying-glass"></i> Visualizar</a>
                        <a href="{{BASE}}livros/editar/{{livro.id}}" class="btn btn-warning btn-sm me-md-2"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>


{% endblock %}