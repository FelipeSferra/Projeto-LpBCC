{% extends "partials/body.twig.php" %}

{% block title %}{{livro.titulo}}{% endblock %}

{% block body %}
<br>
<a class="icon-link icon-link-hover" href="{{BASE}}">
    Voltar
</a>
<div class="row">
    <div class="col-md-12 mt-3">
        <h1>{{livro.titulo}}</h1>
    </div>
</div>

<hr>
<div class="container text-center">
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
        <div class=" col-md-8">
            <div class="text-end">
                <p>{{livro.sinopse}}</p>
            </div>
            <div class="text-end">
                <button class="btn btn-success">teste</button>
            </div>
        </div>
    </div>
</div>

{% endblock %}