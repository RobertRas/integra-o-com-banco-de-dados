<?php

require_once __DIR__ ."/../auth/autenticacao.php";

if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
}

$senha = $_POST["senha"];

Autenticacao::Logar($email, $senha);