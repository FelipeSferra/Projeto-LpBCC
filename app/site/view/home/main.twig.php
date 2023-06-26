{% extends "partials/body.twig.php" %}

{% block title %} Brisa Livros {% endblock %}

{% block body %}
<br>
<h1>Home</h1>
<hr>
<div class="row mt-4">
    {% for livro in listaLivros %}
    <div class="col-md-3">
        <div class="card border-primary mb-2" style="max-width: 20rem;">
            <div class="card-body">
                <img src="{{livro.thumb}}" alt="{{livro.slug}}" class="w-100 img-thumb">
                <hr>
                <h5 class="card-title text-truncate">{{livro.titulo}}</h5>
                <a href="{{BASE}}livros/visualizar/{{livro.slug}}" class="stretched-link"></a>
            </div>
        </div>
    </div>
    {% endfor %}
</div>
{% endblock %}