<?php
define('IN_VCP', true);

if(!file_exists('_inc_/config.php')) {
    header('Location: install/');
    exit;
} elseif(file_exists('install/')) {
    unlink('install/index.php');
    rmdir('install');
}

ini_set('display_errors', 'off');
session_start();
date_default_timezone_set('America/Sao_Paulo');
require('config.php');
$vcp->notLoggedRedir();
$vcp->setCookies();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="(Mike)">
    <meta name="robots" content="index,follow">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $CONFIG['serverName']; ?> vCP - by Mike</title>
    <link rel="stylesheet" href="styles/style.css" type="text/css" media="screen">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tops').change(function() {
                var val = $(this).val();
                if(val > 0) {
                    window.location = "top.php?id=" + val;
                }
            });
            
            $('.votar img').click(function() {
                window.open('votar.php?id='+$(this).attr('rel'), 'teste', 'height = 600, width = 800');
                document.location.reload();
            });
            
            $('.confirm').click(function() {
                if(!confirm($(this).attr('rel'))) {
                    return false;
                }
            });

        });
    </script>
</head>
<body>
    <div id="tudo">

        <div id="topo">
            <img src="images/topo.jpg" alt="">
            <div id="menu">
                <?php if($vcp->isLogged()): ?>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="itens.php">Itens</a></li>
                        <?php if($_SESSION['v_infos']['level'] >= $CONFIG['admLevel']): ?>
                            <li><a href="add-top.php">Adicionar TOP</a></li>
                            <li><a href="add-item.php">Adicionar Item</a></li>
                        <?php endif; ?>
                        <li><a href="deslogar.php">Deslogar</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <div id="conteudo">
			
					
        </div>

    </div>
</body>
</html>
