<?php
require '_inc_/header.php';

$vcp->levelCheck();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vcp->addItem();
}

?>

<h3>Adicionar item</h3>
<br />

<form method="POST">
    <label for="item_id">ID do item:</label>
    <input type="text" name="item_id" id="item_id" value="<?= $_POST['item_id'] ?? '' ?>" />

    <label for="nome">Nome do item:</label>
    <input type="text" name="nome" id="nome" value="<?= $_POST['nome'] ?? '' ?>" />

    <label for="quantidade">Quantidade: <small class="c2">(Não aumente caso seja um equipamento ou uma arma)</small></label>
    <input type="text" name="quantidade" id="quantidade" value="<?= $_POST['quantidade'] ?? 1 ?>" />

    <label for="pontos">Pontos:</label>
    <input type="text" name="pontos" id="pontos" value="<?= $_POST['pontos'] ?? '' ?>" />

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao"><?= $_POST['descricao'] ?? '' ?></textarea><br />

    <input type="submit" value="Enviar" class="bt" />
</form>

<?php
require '_inc_/footer.php';
