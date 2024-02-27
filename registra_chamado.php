<?php 
    session_start();

    //$informacoes = $_POST; //recebe o array completo do input
    //$texto = $informacoes['titulo'] .'#'. $informacoes['categoria'] .'#'. $informacoes['descricao'];
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);
    $texto = $_SESSION['id_usuario'] . '#' .$titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
    
    $arquivo = fopen('arquivo.hd', 'a');
    fwrite($arquivo, $texto);
    fclose($arquivo);
    header('location: abrir_chamado.php');

?>