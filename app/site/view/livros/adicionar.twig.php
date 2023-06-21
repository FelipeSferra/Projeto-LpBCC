{% extends "partials/body.twig.php" %}

{% block title %}Teste - Novo Livro{% endblock %}

{% block body %}
<br>
<h1>Novo Livro</h1>

<hr>

<form action="{{BASE}}livros/inserir" onsubmit="return validar(false);" method="post">
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="txtTitulo">Título</label>
            <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Título Aqui">
        </div>
        <div class="col-md-3 mt-3">
            <label for="slStatus">Status</label>
            <select id="slStatus" name="slStatus" class="form-select">
                <option selected>Selecione...</option>
                <option value="0">Disponível</option>
                <option value="1">Emprestado</option>
                <option value="2">Atrasado</option>
            </select>
        </div>
        <div class="col-md-3 mt-3">
            <label for="nmQtde">Quantidade</label>
            <input type="number" id="nmQtde" name="nmQtde" class="form-control" placeholder="Quantidade em estoque">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mt-3">
            <label for="slEditora">Editora</label>
            <select id="slEditora" name="slEditora" class="form-select">
                <option selected>Selecione...</option>
                {% for editora in listaEditora %}
                <option value="{{editora.id}}">{{editora.nome}}</option>
                {% endfor %}
            </select>
        </div>
        <div class="col-md-4 mt-3">
            <label for="slGenero">Gênero</label>
            <select id="slGenero" name="slGenero" class="form-select">
                <option selected>Selecione...</option>
                {% for genero in listaGenero %}
                <option value="{{genero.id}}">{{genero.descricao}}</option>
                {% endfor %}
            </select>
        </div>
        <div class="col-md-4 mt-3">
            <label for="slAutor">Autor</label>
            <select id="slAutor" name="slAutor" class="form-select">
                <option selected>Selecione...</option>
                {% for autor in listaAutor %}
                <option value="{{autor.id}}">{{autor.nome}}</option>
                {% endfor %}
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div id="dvAlert">
            <div class="alert alert-info col-md-6">Preencha todos os campos corretamente</div>
        </div>
        <div class="text-end">
            <a href="{{BASE}}livros/" class="btn btn-danger me-md-2" role="button"><i class="fa-solid fa-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success me-md-2"><i class="fa-solid fa-check"></i> Adicionar</button>
        </div>
    </div>
</form>
<script src="{{BASE}}js/livros.js"></script>
{% endblock %}