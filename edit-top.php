<?php
define('INC_PATH', '_inc_/');
require(INC_PATH . 'config.php');
require(INC_PATH . 'functions.php');
require(INC_PATH . 'class.vcp.php');

$vcp = new VCP($_GET['id']);

require(INC_PATH . 'header.php');

$vcp->levelCheck();

if ($vcp->getTopInfos()) {
    $x = $vcp->index[0];
    $vcp->addTop();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $vcp->processEditForm($_POST);
    }

    ?>
    <h3>Editar TOP</h3><br />
    <form action="edit-top.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" method="post">
        <label for="nome">Nome do TOP:</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars(isset($_POST['nome']) ? $_POST['nome'] : $x['nome']); ?>" />
        <label for="url">URL do TOP:</label>
        <input type="text" name="url" id="url" value="<?php echo htmlspecialchars(isset($_POST['url']) ? $_POST['url'] : $x['url']); ?>" />
        <label for="minutos">Minutos para votar novamente:</label>
        <input type="text" name="minutos" id="minutos" value="<?php echo htmlspecialchars(isset($_POST['minutos']) ? $_POST['minutos'] : $x['minutos']); ?>" />
        <label for="pontos">Pontos ganhos por voto:</label>
        <input type="text" name="pontos" id="pontos" value="<?php echo htmlspecialchars(isset($_POST['pontos']) ? $_POST['pontos'] : $x['pontos']); ?>" /><br />
        <input type="image" src="images/bt-enviar.png" class="bt" />
    </form>

    <?php
} else {
    $vcp->setFlash(ERROR_9, 'error');
}

require(INC_PATH . 'footer.php');
?>
