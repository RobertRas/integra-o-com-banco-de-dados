<?php
require_once __DIR__ ."/../models/usuario.php";

// 1. Recebe o email com fallback para evitar que a variável fique indefinida
$email_recebido = $_POST["email"] ?? '';

if (filter_var($email_recebido, FILTER_VALIDATE_EMAIL)) {
    $email = filter_var($email_recebido, FILTER_SANITIZE_EMAIL);
} else {
    // Se o email não for válido, você pode parar a execução ou redirecionar de volta avisando do erro
    die("Erro: E-mail inválido."); 
}

// 2. Recebe a senha do POST (agora tudo minúsculo conforme arrumamos no HTML)
$senha_pura = $_POST["senha"] ?? '';

if(empty($senha_pura)){
    die("Erro: Senha não pode ficar em branco.");
}

$senha_hash = password_hash($senha_pura, PASSWORD_DEFAULT);

$novoUsuario = new Usuario();
$novoUsuario->setEmail($email);
$novoUsuario->setsenha($senha_hash); 
$novoUsuario->criar();




header("Location: /CRUD_YT/views/login.php");
exit();