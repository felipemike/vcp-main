<?php
// Redireciona para a página principal caso IN_VCP não esteja definido
if (!defined('IN_VCP')) {
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
	exit;
}

// Exibe mensagens flash se existirem
$vcp->flash();
?>
</div>
<div id="footer">
	<?php echo $CONFIG['serverName']; ?> vCP 2.0 - Todos os direitos reservados<br />
	Sistema desenvolvido por <a href="" target="_blank">Mike</a>
</div>
</div>
</body>
</html>