<?php

require_once __DIR__ ."/../configs/conexao.php";
require_once __DIR__ ."/../models/usuario.php";

session_start();
class Autenticacao
{
    public static function Logar($email, $senha)
    {
        $sql = "select*from usuario where email = :email";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $usuario =  $stmt->fetch();

       // ...
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nivel'] = $usuario['nivel_acesso'];
            header('Location: /CRUD_YT/index.php');
            exit();
        } else {
            // MUDE AQUI: Se errar a senha ou email, volte para a tela de login!
            header('Location: /CRUD_YT/views/login.php');
            exit();
        }
    }
    public static function estaAutenticado()
    {
        return isset($_SESSION['id_usuario']);
    }

    public static function logout(){
        session_unset();
        session_destroy();
        header('Location: /CRUD_YT/views/login.php');
        exit();
    }
}
