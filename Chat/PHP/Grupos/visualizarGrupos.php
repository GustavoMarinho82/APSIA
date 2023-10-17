<?php
    include("../conexao.php");
    session_start();

    $id_remetente = $_SESSION['id_usuario'];
    $output = "";

    $sql = "SELECT * FROM grupos";
        $consulta = mysqli_query($mysqli, $sql);


    if (mysqli_num_rows($consulta) == 0){
        $output .= "Nenhum grupo está disponível!";

    } else {
        include("../pesquisaGrupo.php");
    }

    echo $output;
?>