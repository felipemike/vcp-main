<?php
require '_inc_/config.php';
require '_inc_/vcp.class.php';

$vcp = new VCP();

// Set page metadata
$vcp->setPageTitle('VCP - Vote e Conquiste Pontos');
$vcp->setPageDescription('Vote e Conquiste Pontos');
$vcp->setPageKeywords('Vote, Conquiste, Pontos');

// Load header
require '_inc_/header.php';

// Display user's points
echo '<strong class="c1">Seus pontos:</strong> ' . $vcp->getPoints() . '<br /><br />';

// Display tops and allow user to select one
$tops = $vcp->getTops(true);
if (!$tops) {
  $vcp->setFlash('Não há tops registrados', 'info');
} else {
  echo '<div id="selecionar-top">';
  echo 'Top: <select id="tops">';
  echo '<option value="0">Selecione</option>';
  echo $tops;
  echo '</select></div>';
  $vcp->setFlash('Selecione o TOP que deseja visualizar e vote para ganhar pontos', 'info');
}

// Load footer
require '_inc_/footer.php';
?>