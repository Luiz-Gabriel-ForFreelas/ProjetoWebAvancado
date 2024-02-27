<?php
  session_start(); #infomra ao PHP que utilizaremos os módulos de sessão nesta página.

  if (!(isset($_SESSION['autenticado'])) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: index.php?login=erro2');
  }
?>
