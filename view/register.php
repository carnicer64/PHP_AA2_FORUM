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
<p>Para registrarte en el foro, introduce los datos:</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="username">Nombre de usuario:</label>
    <input id="username" type="text" name="username" <?php echo (isset($_POST["username"]) ? 'value="'.$_POST["username"].'"' : ''); ?>>
    <label for="name">Nombre:</label>
    <input id="name" type="text" name="name" <?php echo (isset($_POST["name"]) ? 'value="'.$_POST["name"].'"' : ''); ?>>
    <label for="password">Password:</label>
    <input id="password" type="password" name="password">
    <label for="password2">Repeat password:</label>
    <input id="password2" type="password" name="password2">
    <label for="email">Email:</label>
    <input id="email" type="text" name="email" <?php echo (isset($_POST["email"]) ? 'value="'.$_POST["email"].'"' : ''); ?>>
    <input type="submit" name="register" value="Register">

</form>
<?php
}
?>
