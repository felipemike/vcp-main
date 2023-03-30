<?php
	require('_inc_/config.php');
	require('_inc_/functions.php');
	require('_inc_/class.vcp.php');
	$vcp = new vcp();

require('_inc_/header.php');
	$vcp->levelCheck();
	if($vcp->getTopInfos($_GET['id'])) {
	$x = $vcp->index[0];
	?>
	<h3>Editar TOP</h3><br />
	<form action="edit-top.php?id=<?php echo $_GET['id']; ?>" method="post">
	<label for="nome">Nome do TOP:</label> <input type="text" name="nome" id="nome" value="<?php echo (isset($_POST['nome'])) ? $_POST['nome'] : $x['nome']; ?>" />
	<label for="url">URL do TOP:</label> <input type="text" name="url" id="url" value="<?php echo (isset($_POST['url'])) ? $_POST['url'] : $x['url']; ?>" />
	<label for="minutos">Minutos para votar novamente:</label> <input type="text" name="minutos" id="minutos" value="<?php echo (isset($_POST['minutos'])) ? $_POST['minutos'] : $x['minutos']; ?>" />
	<label for="pontos">Pontos ganhos por voto:</label> <input type="text" name="pontos" id="pontos" value="<?php echo (isset($_POST['pontos'])) ? $_POST['pontos'] : $x['pontos']; ?>" /><br />
	<input type="image" src="images/bt-enviar.png" class="bt" />
	</form>

	<?php 
	$vcp->addTop($_GET['id']);
	} else {
		$vcp->setFlash(error_9, 'error');
	}
	require('_inc_/footer.php'); 
	?>