{% extends "partials/body.twig.php" %}

{% block title %}Teste - Visualizar Livro{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Visualizar Livro</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}livros/excluir/{{livroId}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>

<hr>


<div class="row">
    <div class="col-md-6 mt-3">
        <input type="hidden" id="txtId" value="{{livroId}}">
        <label for="txtTitulo">Título</label>
        <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Título Aqui" value="{{livro.titulo}}" readonly>
    </div>
    <div class="col-md-3 mt-3">
        <label for="slStatus">Status</label>
        <input type="text" id="slStatus" name="slStatus" class="form-control" value="{{livro.status}}" readonly>
    </div>
    <div class="col-md-3 mt-3">
        <label for="nmQtde">Quantidade</label>
        <input type="number" id="nmQtde" name="nmQtde" class="form-control" placeholder="Quantidade em estoque" value="{{livro.qtde}}" readonly>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mt-3">
        <label for="slEditora">Editora</label>
        {% for editora in listaEditora %}
        <input type="text" id="slEditora" name="slEditora" class="form-control" value="{{editora.nome}}" readonly>
        {% endfor %}
    </div>
    <div class="col-md-4 mt-3">
        <label for="slGenero">Gênero</label>
        {% for genero in listaGenero %}
        <input type="text" id="slGenero" name="slGenero" class="form-control" value="{{genero.descricao}}" readonly>
        {% endfor %}
    </div>
    <div class="col-md-4 mt-3">
        <label for="slAutor">Autor</label>
        {% for autor in listaAutor %}
        <input type="text" id="slAutor" name="slAutor" class="form-control" value="{{autor.nome}}" readonly>
        {% endfor %}
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-3">
        <label for="txtThumb">Thumbnail</label>
        <input type="text" id="txtThumb" name="txtThumb" class="form-control" placeholder="Thumbnail aqui" value="{{livro.thumb}}" readonly>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-3">
        <label for="txtSinopse">Sinopse</label>
        <textarea class="form-control" id="txtSinopse" name="txtSinopse" rows=3 placeholder="Sinopse aqui" readonly>{{livro.sinopse}}</textarea>
    </div>
</div>

<div class="row mt-4">
    <div class="text-end">
        <a href="{{BASE}}livros/" class="btn btn-success me-md-2" role="button"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
    </div>
</div>

{% endblock %}