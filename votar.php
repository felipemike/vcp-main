<?php

require_once '_inc_/vcp.class.php';
require_once '_inc_/config.php';

session_start();

$vcp = new Vcp();

if(!$vcp->isUserLoggedIn()) {
    $vcp->redirectToLoginPage();
}

if(isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $vcp->vote($id);
}
