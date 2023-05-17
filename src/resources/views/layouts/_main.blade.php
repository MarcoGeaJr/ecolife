<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>R O B E R W A L S O N</title> -->
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/estilo.css" />
</head>
<body>
    <!-- Menu -->
        <div class="menu">
            <a href="/">Home</a>
            <a href="/categorias/carros">Categorias</a>
            <a href="/produtos/carro">Produtos</a>
            <a href="/quemsomos">Quem somos</a>
        </div>
    <!-- Menu -->
    <!-- Conteúdo -->
    <div class="conteudo">
        @yield('content')
    </div>
    <!-- Conteúdo -->
</body>
</html>