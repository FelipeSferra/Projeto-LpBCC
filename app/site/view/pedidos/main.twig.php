{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Pedidos{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Pedidos</h1>
    </div>
</div>

<hr>

<div class="overflow-auto">
    <table class="table table-light table-striped table-sm">
        <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Livro</th>
            <th>Cliente</th>
            <th>Data de Emprestimo</th>
            <th>Data de Devolução</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

{% endblock %}