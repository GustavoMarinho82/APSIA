<?php
    include("PHP/conexao.php");
    session_start();
    
    /*if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
    }*/
?>

<?php include_once "header.php"; ?>
    <body>
        <div class="wrapper">
            <section class="users">
            <header>
                <div class="content">

                <?php
                    $sql = "SELECT * FROM usuarios WHERE id_usuario={$_SESSION['id_usuario']}";
                        $consulta = mysqli_query($mysqli, $sql);
                            $linha = mysqli_fetch_assoc($consulta);
                ?>

                <img src="imagens/1.png" alt="">
                <div class="details">
                    <span><?php echo $linha['nome']?></span>
                    <p><?php echo "On-line" ?></p>
                </div>
                </div>
                <a href="PHP/Usuarios/deslogar.php" class="logout">Sair</a>
            </header>
            <div class="search">
                <span class="text">Procurar um usuário</span>
                <input type="text" placeholder="Digite um nome para procurar...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
            </section>
        </div>

    <script src="javascript/usuarios.js"></script>

    </body>
</html>
