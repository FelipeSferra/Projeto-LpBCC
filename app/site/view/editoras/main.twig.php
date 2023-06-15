{% extends "partials/body.twig.php" %}

{% block title %} Editoras - Projeto {% endblock %}

{% block body %}
<br><h1>Editoras</h1>

<a href="{{BASE}}editoras/adicionar/" class="btn btn-outline-dark ">Nova editora</a>

<hr>

<div class="overflow-auto">
    <table class="table table-dark table-striped">
        <tr>
            <th>#ID</th>
            <th>Editora</th>
        </tr>
    </table>
</div>

{% endblock %}