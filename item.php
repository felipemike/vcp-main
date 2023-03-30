<?php
require('_inc_/header.php');

echo '<h3>Item</h3>';

if(empty($_GET['id'])) {
    $vcp->setFlash('Um ID deve ser informado', 'error');
} else {
    $id = $_GET['id'];

    if($vcp->getItemInfos($id)) {
        $item = $vcp->index[0];
        
        if($_SESSION['v_infos']['level'] >= $CONFIG['admLevel']) {
            $editUrl = "edit-item.php?id={$item['id']}";
            $deleteUrl = "delete-item.php?id={$item['id']}";
            echo "<a href='{$editUrl}'><img src='images/edit.png' alt='Editar' title='Editar esse item' /></a>";
            echo "<a href='{$deleteUrl}'><img src='images/delete.png' alt='Excluir' title='Excluir esse item' rel='Tem certeza que deseja excluir esse item?' class='confirm' /></a>";
        }

        $itemImageUrl = "{$CONFIG['itemUrl']}{$item['item_id']}{$CONFIG['itemExt']}";
        $itemPoints = $item['pontos'];

        echo "<div id='item-infos'>
            <img src='{$itemImageUrl}' alt='' /><br />
            <strong class='c1'>Item:</strong> {$item['nome']}<br />
            <strong class='c1'>Quantidade:</strong> x{$item['quantidade']}<br />
            <strong class='c1'>Valor:</strong> {$itemPoints} pontos<br />
            <strong class='c1'>Descrição:</strong> {$item['descricao']}<br />";
        
        if($vcp->getPoints() >= $itemPoints) {
            $trocarUrl = "item.php?id={$id}&act=trocar";
            $trocarMessage = "Tem certeza que deseja trocar {$itemPoints} pontos por esse item?";
            echo "<div class='trocar'><a href='{$trocarUrl}'><img src='images/bt-trocar.png' alt='' rel='{$trocarMessage}' class='confirm' /></a></div>";
        }
        
        if(isset($_GET['act']) && $_GET['act'] == 'trocar') {
            $vcp->trocarItem($item['item_id'], $item['quantidade'], $itemPoints);
        }
            
        echo '</div>';
    } else {
        $vcp->setFlash('O item não foi encontrado', 'error');
    }
}

require('_inc_/footer.php');
?>
