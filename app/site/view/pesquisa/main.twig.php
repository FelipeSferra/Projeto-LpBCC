{% extends "partials/body.twig.php" %}

{% block title %} Pesquisa: "{{termo}}" {% endblock %}

{% block body %}
<br>
<h1>Pesquisa por: "{{termo}}"</h1>

<p>Exibindo <span class="fw-bold">{{qtdeResultado}}</span> resultado(s)</p>

<hr>

<div class="row mt-4">
    {% for livro in listaLivros %}
    <div class="col-md-4">
        <div class="card border-primary mb-3" style="max-width: 20rem;">
            <div class="card-body">
                <img src="{{livro.thumb}}" alt="{{livro.slug}}" class="w-100 img-thumb">
                <hr>
                <h4 class="card-title">{{livro.titulo}}</h4>
                <a href="{{BASE}}livros/visualizar/{{livro.slug}}" class="stretched-link"></a>
            </div>
        </div>
    </div>
    {% endfor %}
</div>

{% endblock %}