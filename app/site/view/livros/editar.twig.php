{% extends "partials/body.twig.php" %}

{% block title %}Brisa Livros - Alterar Livro{% endblock %}

{% block body %}
<br>
<div class="row">
    <div class="col-md-6">
        <h1>Alterar Livro</h1>
    </div>
    <div class="col-md-6">
        <div class="text-end">
            <a href="{{BASE}}livros/excluir/{{livroId}}" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>

<hr>

<form action="{{BASE}}livros/alterar/{{livroId}}" onsubmit="return validar(true);" method="post">
    <div class="row">
        <div class="col-md-6 mt-3">
            <input type="hidden" id="txtId" value="{{livroId}}">
            <label for="txtTitulo">Título</label>
            <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Título Aqui" value="{{livro.titulo}}">
        </div>
        <div class="col-md-3 mt-3">
            <label for="slStatus">Status</label>
            <select id="slStatus" name="slStatus" class="form-select">
                <option value="Disponivel" {{ livro.status == "Disponivel" ? "selected" : "" }}>Disponível</option>
                <option value="Emprestado" {{livro.status == "Emprestado" ? "selected" : "" }}>Emprestado</option>
                <option value="Atrasado" {{livro.status == "Atrasado" ? "selected" : "" }}>Atrasado</option>
            </select>
        </div>
        <div class="col-md-3 mt-3">
            <label for="nmQtde">Quantidade</label>
            <input type="number" id="nmQtde" name="nmQtde" class="form-control" placeholder="Quantidade em estoque" value="{{livro.qtde}}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mt-3">
            <label for="slEditora">Editora</label>
            <select id="slEditora" name="slEditora" class="form-select">
                {% for editora in listaEditora %}
                <option value="{{editora.id}}" {{editora.id == livro.editoraId ? "selected" : ""}}>{{editora.nome}}</option>
                {% endfor %}
            </select>
        </div>
        <div class="col-md-4 mt-3">
            <label for="slGenero">Gênero</label>
            <select id="slGenero" name="slGenero" class="form-select">
                {% for genero in listaGenero %}
                <option value="{{genero.id}}" {{genero.id == livro.generoId ? "selected" : ""}}>{{genero.descricao}}</option>
                {% endfor %}
            </select>
        </div>
        <div class="col-md-4 mt-3">
            <label for="slAutor">Autor</label>
            <select id="slAutor" name="slAutor" class="form-select">
                {% for autor in listaAutor %}
                <option value="{{autor.id}}" {{autor.id == livro.autorId ? "selected" : ""}}>{{autor.nome}}</option>
                {% endfor %}
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtThumb">Thumbnail</label>
            <input type="text" id="txtThumb" name="txtThumb" class="form-control" placeholder="Thumbnail aqui" value="{{livro.thumb}}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="txtSinopse">Sinopse</label>
            <textarea class="form-control" id="txtSinopse" name="txtSinopse" rows=3 placeholder="Sinopse aqui">{{livro.sinopse}}</textarea>
        </div>
    </div>

    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}livros/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Editar</button>
        </div>
    </div>
</form>
<script src="{{BASE}}js/livros.js"></script>
{% endblock %}