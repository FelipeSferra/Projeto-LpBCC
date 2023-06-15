{% extends "partials/body.twig.php" %}

{% block title %}Teste - Livros{% endblock %}

{% block body %}
<br><h1>Livros</h1>

<a href="{{BASE}}livros/adicionar/" class="btn btn-outline-dark ">Novo Livro</a>

<hr>

<div class="overflow-auto">
    <table class="table table-dark table-striped">
        <tr>
            <th>Titulo</th>
            <th>Slug</th>
            <th>Status</th>
            <th>QTDE</th>
            <th>ID Editora</th>
            <th>ID Genero</th>
            <th>ID Autor</th>
        </tr>
    </table>
</div>

{% endblock %}