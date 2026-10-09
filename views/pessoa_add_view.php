
<?php



require_once __DIR__ .'/../templates/_cabecalho.php';

?>

    <section class="m-3">
        <a href="index.php">Voltar</a>
    </section>
    <section class="d-flex justfy-content-center">
        <section class='m-3 w-50 d-flex justfy-content-center'>
            <form action="../controllers/pessoa_add_controller.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome: </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nome">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto: </label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </section>
    </section>

</body>

</html>