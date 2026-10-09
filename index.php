<?php



require_once __DIR__ . '/templates/_cabecalho.php';


$lista = Pessoa::listar();

?>


<?php if (Autenticacao::estaAutenticado()): ?>
    <section class='m-3'>
        <table class="table table-dark table-hover">
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th colspan='2'>
                    <a href="views/pessoa_add_view.php" class="btn btn-success"><span class="material-symbols-outlined"></span>Adicionar</a>
                </th>
            </tr>
            <?php foreach ($lista as $pessoa): ?>
                <tr>
                    <td><img class="foto-perfil" src="data:image;base64,<?= base64_encode($pessoa['foto']) ?>" alt=""></td>
                    <td><?= $pessoa["nome"] ?></td>
                    <?php if ($_SESSION["nivel"] > 1): ?>
                        <td>
                            <a href="views/pessoa_edit_view.php?id=<?= $pessoa['id_pessoa'] ?>" class="btn btn-warning">editar</a>
                        </td>
                        <td>
                            <form action="controllers/pessoa_del_controller.php" method="post" onsubmit="return confirm('Você tem certeza que quer deletar?')">
                                <input type="hidden" name="id" value="<?= $pessoa['id_pessoa'] ?>">
                                <button type="submit" class="btn btn-danger">Deletar</button>

                            </form>
                        </td>
                    <?php else : ?>
                        <td></td>
                        <td></td>
                    <?php endif ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php else : ?>
    <h1>REALIZE O LOGIN!</h1>
<?php endif; ?>
</body>

</html>