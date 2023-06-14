<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="{{BASE}}img/favicon.ico" type="image/x-icon"> -->
    <link rel="stylesheet" href="{{BASE}}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{BASE}}css/style.css">
    <title>{% block title %}{% endblock %}</title>

    {% block head %}{% endblock %}
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
        <div class="max-width">
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{BASE}}">LOGO AQUI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}cadastros/"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}about/">SOBRE</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-width">
        {% block body %}{% endblock %}
    </div>
</body>

</html>