<?php

require_once __DIR__ .'/../templates/_cabecalho.php';

require_once __DIR__ . "/../models/pessoa.php";

$id = $_GET["id"];
$pessoa = new Pessoa($id);

if (!Autenticacao::estaAutenticado() || $_SESSION["nivel"] <= 1) {
    header("Locatio: /CRUD_YT/index.php");
}

?>



    
    <section class="m-3">
        <a href="index.php">Voltar</a>
    </section>
    <section class="d-flex justfy-content-center">
        <section class='m-3 w-50 d-flex justfy-content-center'>
            <form action="../controllers/pessoa_edit_controller.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $pessoa->getId(); ?>">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome: </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nome" value="<?= $pessoa->getNome(); ?>">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto: </label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">atualizar</button>
                </div>
            </form>
        </section>
    </section>

</body>

</html>