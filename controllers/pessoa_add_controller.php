<?php
require_once __DIR__ .'/../models/pessoa.php';

$nome = $_POST['nome'];
$foto = null;

// Verifica se o arquivo foi enviado corretamente
if(isset($_FILES['foto']['tmp_name']) && !empty($_FILES['foto']['tmp_name'])){
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
}

$pessoa = new Pessoa();
$pessoa->setNome($nome); 

if($foto){
    $pessoa->setFoto($foto);
}else{
    // Caminho da imagem placeholder (verifique se este caminho está 100% correto no seu servidor)
    $pessoa->setFoto(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/CRUD_YT/images/usuario_placeholder.jpg'));
}

$pessoa->criar();
header('Location: ../index.php');
exit();