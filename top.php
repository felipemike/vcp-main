<?php
require('_inc_/header.php');
echo '<h3>' . _('View Top') . '</h3>';

if(empty($_GET['id'])) {
    $vcp->setFlash(_('An ID must be provided'), 'error');
} else {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if($vcp->getTopInfos($id)) {
        $res = $vcp->index[0];
        $canVote = ($vcp->voteTime($res['id'], $res['minutos']) && $vcp->voteCookie($res['id'], $res['minutos']));

        if($_SESSION['v_infos']['level'] >= $CONFIG['admLevel']) {
            echo '<a href="edit-top.php?id=' . $res['id'] . '"><img src="images/edit.png" alt="' . _('Edit') . '" title="' . _('Edit this top') . '" /></a>
                  <a href="delete-top.php?id=' . $res['id'] . '"><img src="images/delete.png" alt="' . _('Delete') . '" title="' . _('Delete this top') . '" rel="' . _('Are you sure you want to delete this top?') . '" class="confirm" /></a>';
        }

        echo '<div id="top-infos">
                <strong class="c1">' . _('Top Name:') . '</strong> ' . $res['nome'] . '<br />
                <strong class="c1">' . _('Points Earned:') . '</strong> ' . $res['pontos'] . ' ' . _('points') . '<br /><br />
                <strong class="c1">' . _('You Can Vote:') . '</strong> ' . ($canVote ? _('Yes') : _('No')) . '<br />';

        if(!$canVote) {
            $data = (count($vcp->index) > 0) ? $vcp->index[0]['data'] : $_COOKIE['t_' . $res['id']];
            echo '<strong class="c1">' . _('Next vote on:') . '</strong> ' . date('d/m/Y H:i:s', $data);
        } else {
            echo '<div class="votar"><img src="images/bt-votar.png" alt="" rel="' . $res['id'] . '" /></div>';
        }

        echo '</div>';

    } else {
        $vcp->setFlash(_('Error retrieving top information'), 'error');
    }
}

require('_inc_/footer.php');
?>