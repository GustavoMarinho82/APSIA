<?php
    include("../conexao.php");
    session_start();
    
    $id_remetente = $_SESSION['id_usuario'];
    $id_destinatario = mysqli_real_escape_string($mysqli, $_POST['id_destinatario']);
    $mensagem = mysqli_real_escape_string($mysqli, $_POST['mensagem']);
    //$agora = date('Y-m-d h:i');

    if(!empty($mensagem)){
        $sql = "INSERT INTO mensagens (conteudo, remetente_id, destinatario_id) VALUES ('$mensagem', $id_remetente, $id_destinatario)";
            mysqli_query($mysqli, $sql);
    }
?>