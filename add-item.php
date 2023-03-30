<?php


require('_inc_/header.php');
	$vcp->levelCheck();
	?>
	<h3>Adicionar item</h3><br />
	<form action="add-item.php" method="post">
	<label for="item_id">ID do item:</label> <input type="text" name="item_id" id="item_id" value="<?php echo (isset($_POST['item_id'])) ? $_POST['item_id'] : null; ?>" />
	<label for="nome">Nome do item:</label> <input type="text" name="nome" id="nome" value="<?php echo (isset($_POST['nome'])) ? $_POST['nome'] : null; ?>" />
	<label for="quantidade">Quantidade: <small class="c2">(N�o aumente caso seja um equipamento ou uma arma)</small></label> <input type="text" name="quantidade" id="quantidade" value="<?php echo (isset($_POST['quantidade'])) ? $_POST['quantidade'] : 1; ?>" />
	<label for="pontos">Pontos:</label> <input type="text" name="pontos" id="pontos" value="<?php echo (isset($_POST['pontos'])) ? $_POST['pontos'] : null; ?>" />
	<label for="descricao">Descri��o:</label> <textarea name="descricao" id="descricao"><?php echo (isset($_POST['descricao'])) ? $_POST['descricao'] : null; ?></textarea><br />
	<input type="image" src="images/bt-enviar.png" class="bt" />
	</form>

	<?php 
	$vcp->addItem();
	require('_inc_/footer.php'); 
	?>