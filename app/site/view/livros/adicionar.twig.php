{% extends "partials/body.twig.php" %}

{% block title %}Teste - Novo Livro{% endblock %}

{% block body %}
<br>
<h1>Novo Livro</h1>

<form action="" onsubmit="" method="post">
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="txtTitulo">Título</label>
            <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Título Aqui">
        </div>
        <div class="col-md-3 mt-3">
            <label for="slStatus">Status</label>
            <select id="slStatus" name="slStatus" class="form-select">
                <option selected>Selecione...</option>
                <option value="">Disponível</option>
                <option value="">Emprestado</option>
                <option value="">Atrasado</option>
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
                <!-- montar for para buscar na tabela -->
            </select>
        </div>
        <div class="col-md-4 mt-3">
            <label for="slGenero">Gênero</label>
            <select id="slGenero" name="slGenero" class="form-select">
                <option selected>Selecione...</option>
                <!-- montar for para buscar na tabela -->
            </select>
        </div>
        <div class="col-md-4 mt-3">
            <label for="slAutor">Autor</label>
            <select id="slAutor" name="slAutor" class="form-select">
                <option selected>Selecione...</option>
                <!-- montar for para buscar na tabela -->
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="text-end">
            <a href="{{BASE}}livros/" class="btn btn-danger me-md-2" role="button">Cancelar</a>
            <input type="submit" value="Adicionar" class="btn btn-success me-md-2">
        </div>
    </div>
</form>
{% endblock %}