<?php



require_once __DIR__ .'/../templates/_cabecalho.php';

?>


    <section class="m-3">
        <a href="../index.php">Voltar</a>
    </section>
    <section class="d-flex justfy-content-center">
        <section class='m-3 w-50 d-flex justfy-content-center'>
            <form action="../controllers/login.php" method="post" >
                <div class="mb-3">
                    <label for="email" class="form-label">Email: </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="email">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha: </label>
                    <input type="password" class="form-control" id="foto" name="Senha">
                </div>

                <div class="mb=3">
                    
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Logar</button>
                </div>
            </form>
        </section>
    </section>

</body>

</html>