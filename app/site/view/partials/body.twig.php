<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- <link rel="shortcut icon" href="{{BASE}}img/favicon.ico" type="image/x-icon"> -->
    <link rel="stylesheet" href="{{BASE}}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{BASE}}css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>{% block title %}{% endblock %}</title>

    {% block head %}{% endblock %}
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="max-width">
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{BASE}}">LOGO AQUI</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{BASE}}livros/">Livros</a>
                            <a class="dropdown-item" href="{{BASE}}generos/">Gêneros</a>
                            <a class="dropdown-item" href="{{BASE}}autores/">Autores</a>
                            <a class="dropdown-item" href="{{BASE}}editoras">Editoras</a>
                            <a class="dropdown-item" href="{{BASE}}clientes/">Clientes</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{BASE}}about/">Sobre</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="search" placeholder="Pesquisar">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-width">
        {% block body %}{% endblock %}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="{{BASE}}js/script.js"></script>
</body>

</html>