<?php
include("header.php");
require_once("../controller/userController.php");
if(isset($_GET["register"])){
    if($_GET["register"] == "correct"){
        ?>
        <p>Registro correcto</p>
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
    <h2 class="text-center">User Register</h2>
    <div class="p-5">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group text-left">
                <label for="nombre">* Username:</label>
                <input id="username" class="form-control" type="text" name="username" <?php echo (isset($_POST["username"]) ? 'value="'.$_POST["username"].'"' : ''); ?>>
            </div>

            <div class="form-group text-left">
                <label for="name">* Name:</label>
                <input id="name" class="form-control" type="text" name="name" <?php echo (isset($_POST["name"]) ? 'value="'.$_POST["name"].'"' : ''); ?>>
            </div>

            <div class="form-group text-left">
                <label for="password">* Password:</label>
                <input id="password" class="form-control" type="password" name="password">
            </div>

            <div class="form-group text-left">
                <label for="password2">* Repeat password:</label>
                <input id="password2" class="form-control" type="password" name="password2">
            </div>

            <div class="form-group text-left">
                <label for="email">* Email:</label>
                <input id="email" class="form-control" type="text" name="email" <?php echo (isset($_POST["email"]) ? 'value="'.$_POST["email"].'"' : ''); ?>>
            </div>
            <div class="form-group text-left">
                <br>
                <input type="submit" name="register" value="Register" class="btn btn-success py-2">
            </div>
        </form>
    </div>
<?php
}
?>

