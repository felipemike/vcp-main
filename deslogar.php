<?

// Destroi a sessão

session_start();
unset($_SESSION['v_logged']);
header('Location: index.php');
?>