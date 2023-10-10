<?php
    session_start();
    include("../conexao.php");

    $id_remetente = $_SESSION['id_usuario'];
    $termoPesquisa = mysqli_real_escape_string($mysqli, $_POST['termoPesquisa']);
    $output = "";

    $sql = "SELECT * FROM usuarios WHERE NOT id_usuario = $id_remetente AND (nome LIKE '%{$termoPesquisa}%' OR email LIKE '%{$termoPesquisa}%') ";
        $consulta = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($consulta) > 0){
        include("../pesquisa.php");

    } else {
        $output .= 'Nenhum usuário encontrado com base na pesquisa';
    }

    echo $output;
?>