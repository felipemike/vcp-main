<?php
require('_inc_/vcp.class.php');
$vcp = new vcp();
session_start();
require('_inc_/config.php');
$vcp->notLoggedRedir();
if(!empty($_GET['id'])) {
	$vcp->vote($_GET['id']);
}
?>