<?php
    session_start();
    include("../conexao.php");

    $id_remetente = $_SESSION['id_usuario'];
    $termoPesquisa = mysqli_real_escape_string($mysqli, $_POST['termoPesquisa']);
    $output = "";

    $sql = "SELECT * FROM grupos WHERE nome LIKE '%{$termoPesquisa}%' ";
        $consulta = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($consulta) > 0){
        include("../pesquisaGrupo.php");

    } else {
        $output .= 'Nenhum grupo encontrado com base na pesquisa';
    }

    echo $output;
?>