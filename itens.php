<?
	require('_inc_/config.php');
	require('_inc_/vcp.class.php');
	$vcp = new vcp;
	$vcp->setPageTitle('Itens');
	$vcp->setPageDescription('Itens');
	$vcp->setPageKeywords('Itens');
	$vcp->setPageType('itens');
	$vcp->setPageContent('itens');
	$vcp->setPageCss('itens');
	$vcp->setPageJs('itens');

require('_inc_/header.php'); 
	echo '<h3>Itens</h3><br />';
	$vcp->getItens();
	$x = $vcp->index;
	if(count($x) > 0) {
	?>
	<table id="itens">
		<tr>
		<th>#</th>
		<th>Item</th>
		<th>Qnt</th>
		<th>Pontos</th>
		</tr>
	<?php
	for($i = 0, $c = count($x); $i < $c; $i++) {
		echo '
		<tr>
		<td><img src="', $CONFIG['itemUrl'], $x[$i]['item_id'], $CONFIG['itemExt'], '" alt="" /></td>
		<td><a href="item.php?id=', $x[$i]['id'], '">', $x[$i]['nome'], '</a></td>
		<td>x', $x[$i]['quantidade'], '</td>
		<td>', $x[$i]['pontos'], '</td>
		</tr>
		';
	}
	} else {
		$vcp->setFlash('N�o h� itens registrados', 'info');
	}
	?>
	</table>
	<?php require('_inc_/footer.php'); ?>