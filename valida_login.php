<?php

    session_start(); #infomra ao PHP que utilizaremos os módulos de sessão nesta página.
    #$_SESSION é um superglobal em forma de array do lado do servidor.

    //verifica se o usuário foi autenticado
    $usuario_autenticado = false;

    //usuarios do sistema
    $perfis = Array(1 => 'administrativo', 2 => 'usuario');
    $usuarios_app = Array(
        Array('email' => 'adm@teste.com.br', 'senha' => '123456', 'id' => 1, 'perfil_id' => 1),
        Array('email' => 'user@teste.com.br', 'senha' => 'abcd', 'id' => 2, 'perfil_id' => 2),
        Array('email' => 'jose@teste.com.br', 'senha' => 'dcba', 'id' => 3, 'perfil_id' => 2,),
        Array('email' => 'maria@teste.com.br', 'senha' => '654321', 'id' => 4, 'perfil_id' => 2)
    );

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    #roda pela lista inteira agregado a variavel $user a cada array de usuário
    foreach($usuarios_app as $user) {
        #verifique se o email e senha do $_POST é compativel com algum usuário cadastrado.
        if ($user['email'] == $email && $user['senha'] == $senha) {
            $usuario_autenticado = true;
            $id_usuario = $user['id'];
            $id_perfil = $user['perfil_id'];
        } 
    }

    if ($usuario_autenticado) {
        echo 'Usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['id_perfil'] = $id_perfil;
        header('location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('location: index.php?login=erro');
    }

?>