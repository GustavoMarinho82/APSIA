<?php
    include("../conexao.php");
    session_start();

    $id_remetente = $_SESSION['id_usuario'];
    $id_destinatario = mysqli_real_escape_string($mysqli, $_POST['id_destinatario']);
    $output = "";

    $sql = "SELECT * FROM mensagens LEFT JOIN usuarios ON usuarios.id_usuario = mensagens.remetente_id
            WHERE (remetente_id = $id_remetente AND destinatario_id = $id_destinatario)
            OR (remetente_id = $id_destinatario AND destinatario_id = $id_remetente) ORDER BY horario";

    $consulta = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($consulta) > 0){
        while($linha = mysqli_fetch_assoc($consulta)){

            if($linha['remetente_id'] === $id_remetente){
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $linha['conteudo'] .'</p>
                            </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                            <img src="imagens/profile-icon1.png" alt="">
                            <div class="details">
                                <p>'. $linha['conteudo'] .'</p>
                            </div>
                            </div>';
            }
        }

    } else {
        $output .= '<div class="text">Nenhuma mensagem disponível. Sua futura conversa aparecerá aqui.</div>';
    }

    echo $output;
?>