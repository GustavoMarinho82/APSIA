<?php
    include("../conexao.php");
    session_start();

    $id_remetente = $_SESSION['id_usuario'];

    $output = '<a href="Chat.php?q=0">
                    <div class="content">
                    <img src="imagens/profile-icon2.png" alt="">
                    <div class="details">
                        <span>AI</span>
                        <p>ai</p>
                    </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>';

    $sqlU = "SELECT * FROM usuarios WHERE NOT id_usuario = $id_remetente";
        $consultaU = mysqli_query($mysqli, $sqlU);

    $sqlG = "SELECT * FROM grupos";
        $consultaG = mysqli_query($mysqli, $sqlG);


    if (mysqli_num_rows($consultaU) != 0){
        include("../dataU.php");
    }

    if (mysqli_num_rows($consultaG) != 0){
        include("../dataG.php");
    }
    
    if (mysqli_num_rows($consultaU) == 0 AND mysqli_num_rows($consultaG) == 0) {
        $output .= "Nenhum psicólogo ou grupo está disponível!";
    }

    echo $output;
?>