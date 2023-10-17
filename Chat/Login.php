<?php 
    session_start();

    if (isset($_SESSION['id_usuario'])){
        header("Location: Usuarios.php");
    }
?>

<?php include("header.php"); ?>
    <body>
        
        <div class="wrapper">
            <section class="form login">
                <header>Login</header>
                <form method="POST" action="PHP/Usuarios/acaoLogin.php" autocomplete="off">
                    
                    <?php 
                        $email_cadastrado="";

                        if (!empty($_SESSION['erro'])) {
                            echo "<div class='error-text'>" . $_SESSION['erro'] . "</div>";
                            $_SESSION['erro']="";

                        } else if (!empty($_SESSION['email_cadastrado'])) {
                            echo "<div class='sucess-text'>Cadastrado com sucesso!</div>";
                            $email_cadastrado = $_SESSION['email_cadastrado'];
                            $_SESSION['email_cadastrado'] = "";
                        }
                    ?>

                    <div class="field input">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="Digite seu email" value="<?php echo $email_cadastrado?>" required>
                    </div>

                    <div class="field input">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha" required>
                        <i class="fas fa-eye"></i>
                    </div>

                    <div class="field button">
                        <input type="submit" name="submit" value="Logar">
                    </div>
                </form>

                <div class="link">Ainda não possui uma conta? <a href="Cadastro.php">Cadastre-se</a></div>
            </section>
        </div>

        <script src="javascript/pass-show-hide.js"></script>

    </body>
</html>