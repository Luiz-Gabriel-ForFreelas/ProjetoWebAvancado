<?php
    session_start();
    //remover indices do array de sessão
    //unset()

    //destroi a variavel da sessão
    //session_destroy()
    session_destroy();
    header('location: index.php');
?>