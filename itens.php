<?php
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

if (count($x) > 0) {
    ?>
    <table id="itens">
        <tr>
            <th>#</th>
            <th>Item</th>
            <th>Qnt</th>
            <th>Pontos</th>
        </tr>
        <?php
        for ($i = 0, $c = count($x); $i < $c; $i++) {
            echo '<tr>';
            echo '<td><img src="' . $CONFIG["itemUrl"] . $x[$i]["item_id"] . $CONFIG["itemExt"] . '" alt="" /></td>';
            echo '<td><a href="item.php?id=' . $x[$i]["id"] . '">' . htmlspecialchars($x[$i]["nome"]) . '</a></td>';
            echo '<td>x' . htmlspecialchars($x[$i]["quantidade"]) . '</td>';
            echo '<td>' . htmlspecialchars($x[$i]["pontos"]) . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
<?php
} else {
    $vcp->setFlash('Não há itens registrados', 'info');
}
require('_inc_/footer.php');
?>
