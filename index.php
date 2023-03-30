<?php
	require('_inc_/config.php');
	require('_inc_/vcp.class.php');
	
	$vcp = new VCP();
	
	$vcp->setPageTitle('VCP - Vote e Conquiste Pontos');
	$vcp->setPageDescription('Vote e Conquiste Pontos');
	$vcp->setPageKeywords('Vote, Conquiste, Pontos');

require('_inc_/header.php');
	echo '<strong class="c1">Seus pontos:</strong> ', $vcp->getPoints(), '<br /><br />';
	
	$tops = $vcp->getTops(true);
	if(!$tops) {
		$vcp->setFlash('N�o h� tops registrados', 'info');
	} else {
	?>
		<div id="selecionar-top">
		Top: 
		<select id="tops">
		<option value="0">Selecione</option>
		<?php echo $tops; ?>
		</select>
		</div>
		<?php $vcp->setFlash('Selecione o TOP que deseja vizualizar e vote para ganhar pontos', 'info'); ?>
	<?php
	}
	
	require('_inc_/footer.php');
	?>
