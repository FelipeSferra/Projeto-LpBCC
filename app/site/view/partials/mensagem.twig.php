{% extends "partials/body.twig.php" %}

{% block title %} {{title}} - Projeto {% endblock %}

{% block body %}
<br><h1>{{title}}</h1>

<br>

{{message}}

<hr>

<a href="{{BASE}}{{link}}" class="btn btn-success me-md-2">Voltar</a>

{% endblock %}