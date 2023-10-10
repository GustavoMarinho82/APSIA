<?php
    include("../conexao.php");
    session_start();

    $id_remetente = $_SESSION['id_usuario'];
    $output = "";

    $sql = "SELECT * FROM usuarios WHERE NOT id_usuario=$id_remetente";
        $consulta = mysqli_query($mysqli, $sql);


    if(mysqli_num_rows($consulta) == 0){
        $output .= "Nenhum usuário está disponível!";

    } else {
        include("../pesquisa.php");
    }

    echo $output;
?>