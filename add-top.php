<?php
require '_inc_/header.php';

$vcp->levelCheck();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vcp->addTop();
}

?>

<h3>Adicionar TOP</h3>
<br />

<form method="POST">
    <label for="nome">Nome do TOP:</label>
    <input type="text" name="nome" id="nome" value="<?= $_POST['nome'] ?? '' ?>" />

    <label for="url">URL do TOP:</label>
    <input type="text" name="url" id="url" value="<?= $_POST['url'] ?? '' ?>" />

    <label for="minutos">Minutos para votar novamente:</label>
    <input type="text" name="minutos" id="minutos" value="<?= $_POST['minutos'] ?? 1440 ?>" />

    <label for="pontos">Pontos ganhos por voto:</label>
    <input type="text" name="pontos" id="pontos" value="<?= $_POST['pontos'] ?? '' ?>" /><br />

    <input type="submit" value="Enviar" class="bt" />
</form>

<?php
require '_inc_/footer.php';
