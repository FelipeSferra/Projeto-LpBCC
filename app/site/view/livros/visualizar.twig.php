{% extends "partials/body.twig.php" %}

{% block title %}{{livro.titulo}}{% endblock %}

{% block body %}
<br>
<a class="icon-link" href="{{BASE}}">
    Voltar
</a>
<div class="row">
    <div class="col-md-12 mt-3">
        <h1>{{livro.titulo}}</h1>
    </div>
</div>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-2" style="max-width: 20rem;">
                <div class="card-body">
                    <img src="{{livro.thumb}}" alt="{{livro.slug}}" class="w-100 img-thumb">
                    <hr>
                    <span class="fw-bold">Autor:</span>
                    <p>{{autor.id == livro.autorId ? autor.nome : ""}}</p>
                    <span class="fw-bold">Gênero:</span>
                    <p>{{genero.id == livro.generoId ? genero.descricao : ""}}</p>
                    <span class="fw-bold">Editora:</span>
                    <p>{{editora.id == livro.editoraId ? editora.nome : ""}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="text-end">
                <p>{{livro.sinopse}}</p>
            </div>
            {% if USER is not null %}
            <div class="text-end">
                <a href="{{BASE}}livros/" class="btn btn-outline-info btn-md"><i class="fa-solid fa-book"></i> Emprestar o livro</a>
            </div>
            {% endif %}
        </div>
    </div>
</div>

{% endblock %}