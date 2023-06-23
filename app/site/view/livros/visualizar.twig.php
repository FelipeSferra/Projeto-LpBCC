{% extends "partials/body.twig.php" %}

{% block title %}{{livro.titulo}}{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-12">
        <h1>{{livro.titulo}}</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6 mt-3">
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
        <input type="text" id="slEditora" name="slEditora" class="form-control" value="{{editora.nome}}" readonly>
    </div>
    <div class="col-md-4 mt-3">
        <label for="slGenero">Gênero</label>
        <input type="text" id="slGenero" name="slGenero" class="form-control" value="{{genero.descricao}}" readonly>
    </div>
    <div class="col-md-4 mt-3">
        <label for="slAutor">Autor</label>
        <input type="text" id="slAutor" name="slAutor" class="form-control" value="{{autor.nome}}" readonly>
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