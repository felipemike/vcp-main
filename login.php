<?php

require('_inc_/config.php');
require('_inc_/functions.php');
require('_inc_/vcp.class.php');
require('_inc_/header.php');

if ($vcp->isLoggedIn()) {
	$vcp->setFlash('Você já está logado.', 'alert');
} else {
	if (isset($_POST['login']) && isset($_POST['senha'])) {
		$vcp->login();
	} else {
		echo '
		<div id="login-box">
			<form action="login.php" method="post">
				<label for="login">Login:</label> 
				<input type="text" name="login" id="login" value="' . (isset($_POST['login']) ? htmlspecialchars($_POST['login']) : '') . '" />
				<label for="senha">Senha:</label> 
				<input type="password" name="senha" id="senha" value="' . (isset($_POST['senha']) ? htmlspecialchars($_POST['senha']) : '') . '" />
				<input type="image" src="images/bt-logar.png" class="bt" />
			</form>
		</div>';
		$vcp->setFlash('Você precisa estar logado para utilizar o ' . $CONFIG['serverName'] . ' vCP.', 'alert');
	}
}

require('_inc_/footer.php');
?>
