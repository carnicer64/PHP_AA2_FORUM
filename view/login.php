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
<h2>Iniciar Sesion</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <?php
    if (isset($_GET["errorLogin"])){?>
        <div class="alert alert-primary" role="alert">
            Ha habido un error en el login
        </div>
        <?php
    }
    ?>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required <?php echo (isset($_POST["username"]) ? 'value="'.$_POST["username"].'"' : ''); ?>><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>
    <input type="submit" name="login" value="Login">
</form>

<p>¿Aún no estás registrado? <a class="log-reg" href="register.php">Registrarse</a></p>
<?php
}
?>
</body>
</html>