{% extends "partials/body.twig.php" %}

{% block title %} Clientes - Projeto {% endblock %}

{% block body %}
<br><h1>Clientes</h1>

<a href="{{BASE}}clientes/adicionar/" class="btn btn-outline-dark ">Novo cliente</a>

<hr>

<div class="overflow-auto">
    <table class="table table-dark table-striped">
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>QTDE de Emprestimos</th>
        </tr>
    </table>
</div>

{% endblock %}