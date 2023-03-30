<?php
	require '_inc_/config.php';
	require '_inc_/functions.php';
	require '_inc_/class.vcp.php';
	$vcp = new vcp();
	require '_inc_/header.php';

	$vcp->levelCheck();

	if(isset($_GET['id']) && $vcp->getItemInfos($_GET['id'])) {
		$x = $vcp->index[0];

		if(isset($_POST['submit'])) {
			$item_id = htmlspecialchars($_POST['item_id']);
			$nome = htmlspecialchars($_POST['nome']);
			$quantidade = (int) $_POST['quantidade'];
			$pontos = (int) $_POST['pontos'];
			$descricao = htmlspecialchars($_POST['descricao']);

			if(empty($item_id) || empty($nome) || empty($pontos) || empty($descricao)) {
				$vcp->setFlash(error_7, 'error');
			} elseif($vcp->updateItem($_GET['id'], $item_id, $nome, $quantidade, $pontos, $descricao)) {
				$vcp->setFlash(success_4, 'success');
				header('Location: items.php');
				exit;
			} else {
				$vcp->setFlash(error_8, 'error');
			}
		}

		$item_id = isset($_POST['item_id']) ? htmlspecialchars($_POST['item_id']) : $x['item_id'];
		$nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : $x['nome'];
		$quantidade = isset($_POST['quantidade']) ? (int) $_POST['quantidade'] : $x['quantidade'];
		$pontos = isset($_POST['pontos']) ? (int) $_POST['pontos'] : $x['pontos'];
		$descricao = isset($_POST['descricao']) ? htmlspecialchars($_POST['descricao']) : $x['descricao'];
?>

	<h3>Editar item</h3><br />
	<form action="edit-item.php?id=<?php echo $_GET['id']; ?>" method="post">
		<label for="item_id">ID do item:</label>
		<input type="text" name="item_id" id="item_id" value="<?php echo $item_id; ?>" />

		<label for="nome">Nome do item:</label>
		<input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" />

		<label for="quantidade">Quantidade: <small class="c2">(Não aumente caso seja um equipamento ou uma arma)</small></label>
		<input type="text" name="quantidade" id="quantidade" value="<?php echo $quantidade; ?>" />

		<label for="pontos">Pontos:</label>
		<input type="text" name="pontos" id="pontos" value="<?php echo $pontos; ?>" />

		<label for="descricao">Descrição:</label>
		<textarea name="descricao" id="descricao"><?php echo $descricao; ?></textarea><br />

		<input type="submit" name="submit" value="Salvar" class="bt" />
	</form>

<?php 
	} else {
		$vcp->setFlash(error_9, 'error');
	}

	require '_inc_/footer.php'; 
?>
