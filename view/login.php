<?php
include("header.php");
require_once("../controller/userController.php");
if(isset($_GET["login"])){
    if($_GET["login"] == "correct"){
        ?>
        <p>Login correcto</p>
        <p>Redirigiendo en <span id="contador">5</span> segundos...</p>

        <script>
            // Función para actualizar el contador y redirigir
            function redireccionar() {
                var contadorElemento = document.getElementById("contador");
                var segundos = parseInt(contadorElemento.textContent);

                if (segundos > 0) {
                    segundos--;
                    contadorElemento.textContent = segundos;
                    setTimeout(redireccionar, 1000); // Llamar a la función nuevamente después de 1 segundo
                } else {
                    // Redirigir a la otra página cuando el contador llega a 0
                    window.location.href = "../index.php";
                }
            }
            // Iniciar la cuenta atrás al cargar la página
            redireccionar();
        </script>
        <?php
    }
} else {
?>
<body>
    <h1 class="text-center">Login</h1>
    <div class="d-flex justify-content-center align-items-center vh-50">
        <div class="card p-4 bg-light">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <?php
                if (isset($_GET["errorLogin"])){?>
                    <div class="alert alert-primary" role="alert">
                        ERROR in login.
                    </div>
                    <?php
                }
                ?>
                <div class="form-group text-left">
                    <label for="usuario">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" required <?php echo (isset($_POST["username"]) ? 'value="'.$_POST["username"].'"' : ''); ?>><br>
                </div>
                <div class="form-group text-left">
                    <label for="clave">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required><br>
                </div>
                <div class="form-group text-left">
                    <input type="submit" name="login" value="Login" class="btn btn-success">
                </div>
            </form>
            <div class="mt-2">
                <a class="" href="registerUser.php" >New user register</a><br>
            </div>
        </div><!--card-->
    </div>
<?php
}
?>
</body>
</html>