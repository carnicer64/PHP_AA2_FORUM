<?php
include("header.php");
require_once("../controller/postController.php");
if(isset($_GET["postRegister"])){
    if($_GET["postRegister"] == "correct"){
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
                    window.location.href = "viewPost.php?threadID=<?php echo $_GET["threadID"]?>";
                }
            }
            // Iniciar la cuenta atrás al cargar la página
            redireccionar();
        </script>
        <?php
    }
} elseif(isset($_GET["threadID"])) {
    if(isset($_SESSION["user"])){
        if(isset($_GET["edit"])){
            ?>
            <h2 class="text-center">Post edit</h2>
            <div class="p-5">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group text-left">
                        <label for="message">* Message:</label>
                        <textarea id="message" class="form-control" name="message" rows="4" cols="50"><?php echo $_GET["message"] ?></textarea>
                    </div>
                    <input id="threadID" class="form-control" type="hidden" name="threadID" <?php echo 'value=' .$_GET["threadID"] ?>>
                    <input id="postID" class="form-control" type="hidden" name="postID" <?php echo 'value=' .$_GET["postID"] ?>>
                    <div class="form-group text-left">
                        <br>
                        <input type="submit" name="editPost" value="Edit" class="btn btn-success py-2">
                    </div>
                </form>
            </div>
            <?php

        } else {
    ?>
    <h2 class="text-center">Post register</h2>
    <div class="p-5">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group text-left">
                <label for="message">* Message:</label>
                <textarea id="message" class="form-control" name="message" rows="4" cols="50"></textarea>
            </div>
                <input id="threadID" class="form-control" type="hidden" name="threadID" <?php echo 'value=' .$_GET["threadID"] ?>>
                <input id="userID" class="form-control" type="hidden" name="userID" <?php echo 'value=' .$_SESSION["userID"] ?>>

            <div class="form-group text-left">
                <br>
                <input type="submit" name="registerPost" value="Register" class="btn btn-success py-2">
            </div>
        </form>
    </div>
    <?php
        }
    } else {
        ?>
        <h2 class="text-center">You need to be logged</h2>
    <?php
    }
}
?>