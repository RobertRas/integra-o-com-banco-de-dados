<?php

require_once __DIR__ ."/../auth/autenticacao.php";

if(Autenticacao::estaAutenticado()){
    Autenticacao::logout();
} else {
    header("Location: /CRUD_YT/views/login.php");
}