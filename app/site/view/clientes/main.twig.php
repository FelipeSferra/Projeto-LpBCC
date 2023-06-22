{% extends "partials/body.twig.php" %}

{% block title %} Clientes - Projeto {% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Clientes</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}clientes/adicionar/" class="btn btn-outline-dark "><i class="fa-solid fa-plus"></i> Novo cliente</a>
        </div>
    </div>
</div>

<hr>

<div class="overflow-auto">
    <table class="table table-light table-striped table-sm text-center">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>CEP</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Livros Emprestados</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for cliente in listaCliente %}
            <tr>
                <td>{{cliente.id}}</td>
                <td>{{cliente.nome}}</td>
                <td>{{cliente.cep}}</td>
                <td>{{cliente.endereco}}</td>
                <td>{{cliente.numero}}</td>
                <td>{{cliente.cidade}}</td>
                <td>{{cliente.uf}}</td>
                <td>{{cliente.qtde}}</td>
                <td></td>
                <td>
                    <div class="text-end">
                        <a href="{{BASE}}clientes/visualizar/{{cliente.id}}" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass"></i> Visualizar</a>
                        <a href="{{BASE}}clientes/editar/{{cliente.id}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}