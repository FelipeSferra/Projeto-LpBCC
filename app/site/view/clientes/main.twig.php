{% extends "partials/body.twig.php" %}

{% block title %} Clientes - Projeto {% endblock %}

{% block body %}
<br>
<h1>Clientes</h1>

<a href="{{BASE}}clientes/adicionar/" class="btn btn-outline-dark "><i class="fa-solid fa-plus"></i> Novo cliente</a>

<hr>

<div class="overflow-auto">
    <table class="table table-light table-striped table-sm">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>QTDE de Emprestimos</th>
            </tr>
        </thead>
    </table>
</div>

{% endblock %}