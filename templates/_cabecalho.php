<?php

require_once __DIR__ . '/../models/pessoa.php';
require_once __DIR__ . '/../auth/autenticacao.php';



?>

<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-Dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/CRUD_YT/index.php">Início</a>
                        </li>
                        <?php if (!Autenticacao::estaAutenticado()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/CRUD_YT/views/login.php">Login</a>
                                
                            </li>
                            <li>
                                <a class="nav-link" href="/CRUD_YT/views/cadastro.php">Cadastrar</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/CRUD_YT/controllers/logout.php">Sair</a>
                            </li>
                        <?php endif; ?>
                        
                        <li>
                            <?php if (Autenticacao::estaAutenticado()): ?>
                                Olá, <?= $_SESSION['email'] ?>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- <nav>
            <a href="">Início</a>

            
                <a href="">login</a>
            
                <a href="">Sair</a>
          

            
        </nav> -->
    </section>