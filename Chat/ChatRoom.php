<?php
    include("PHP/conexao.php");
    session_start();

    if (!isset($_SESSION['id_usuario'])){
        header("Location: Login.php");
    }
?>

<?php include("header.php"); ?>
    <body>
        <div class="wrapper">
            <section class="chat-area">
            <header>

                <?php 
                    $id_grupo = mysqli_real_escape_string($mysqli, bindec($_GET['q']));
                    
                    $sql = "SELECT * FROM grupos WHERE id_grupo = $id_grupo";
                        $consulta = mysqli_query($mysqli, $sql);;
                            $linha = mysqli_fetch_assoc($consulta);
                ?>

                <a href="Conversas.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="imagens/group-icon.png" alt="">
                <div class="details">
                <span><?php echo $linha['nome'] ?></span>
                </div>
            </header>

            <div class="chat-box">

            </div>

            <form action="#" class="typing-area">
                <input type="text" class="id_grupo" name="id_grupo" value="<?php echo $id_grupo; ?>" hidden>
                <input type="text" class="input-field" name="mensagem"  placeholder="Digite sua mensagem aqui..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
            </section>
        </div>

    <script src="javascript/chatroom.js"></script>

    </body>
</html>