<?php
	// Inclui o arquivo de configuração
	require_once('_inc_/config.php');
	// Inclui o arquivo de funções
	require_once('_inc_/functions.php');
	// Inclui o arquivo de classes
	require_once('_inc_/class.php');
	// Inicia a classe
	$vcp = new vcp;
	// Inclui o header

require('_inc_/header.php');
	$vcp->levelCheck();
	if($vcp->getItemInfos($_GET['id'])) {
		$vcp->deleteItem($_GET['id']);
	} else {
		echo '<h3>Excluir item</h3><br />';
		$vcp->setFlash(error_9, 'error');
	}
	require('_inc_/footer.php'); 
	?>