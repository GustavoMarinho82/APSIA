<?php
    include("PHP/conexao.php");
    session_start();

    if(!isset($_SESSION['id_usuario'])){
        header("Location: Login.php");
    }
    
    $id_destinatario = bindec($_GET['q']);
?>

<?php include("header.php"); ?>
    <body>
        <div class="wrapper">
            <section class="chat-area">
            <header>

                <?php 
                    $id_destinatario = mysqli_real_escape_string($mysqli, bindec($_GET['q']));
                    
                    $sql = "SELECT * FROM usuarios WHERE id_usuario = $id_destinatario";
                        $consulta = mysqli_query($mysqli, $sql);;
                            $linha = mysqli_fetch_assoc($consulta);
                ?>

                <a href="Usuarios.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="imagens/profile-icon1.png" alt="">
                <div class="details">
                <span><?php echo $linha['nome'] ?></span>
                <p><?php echo $linha['email']; ?></p>
                </div>
            </header>

            <div class="chat-box">

            </div>

            <form action="#" class="typing-area">
                <input type="text" class="id_destinatario" name="id_destinatario" value="<?php echo $id_destinatario; ?>" hidden>
                <input type="text" class="input-field" name="mensagem"  placeholder="Digite sua mensagem aqui..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
            </section>
        </div>

    <script src="javascript/chat.js"></script>

    </body>
</html>