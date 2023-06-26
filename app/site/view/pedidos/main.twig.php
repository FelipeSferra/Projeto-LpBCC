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
            {% for pedido in listaPedidos%}
            <tr>
                <td>{{pedido.id}}</td>
                {% for livro in listaLivros %}
                    {% if livro.id == pedido.livroId%}
                    <td>{{livro.titulo}}</td>
                    {% endif %}
                {% endfor %}
                {% for cliente in listaClientes %}
                    {% if cliente.id == pedido.clienteId%}
                    <td>{{cliente.nome}}</td>
                    {% endif %}
                {% endfor %}
                <td>{{pedido.data_emprestimo | date("d/m/Y")}}</td>
                <td>{{pedido.data_devolucao | date("d/m/Y")}}</td>
                <td>
                    <div class="text-end">
                        <a href="{{BASE}}pedidos/visualizar/{{pedido.id}}" class="btn btn-info btn-sm me-md-2"><i class="fa-solid fa-magnifying-glass"></i> Visualizar</a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}