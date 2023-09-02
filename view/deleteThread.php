<?php
include("header.php");
include_once '../controller/threadsController.php';
if(isset($_SESSION["user"])){
    if(isset($_GET["threadDelete"])){
        if($_GET["threadDelete"] = "correct"){
            ?>
            <p>Thread deleted</p>
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
                        window.location.href = "listThreads.php?topicID=<?php echo $_GET["topicID"]?>";
                    }
                }
                // Iniciar la cuenta atrás al cargar la página
                redireccionar();
            </script>
            <?php
        }
    } else {
    ?>
        <div class="container mt-5">
            <h1>Delete Confirmation</h1>
            <p>Are you sure you want to delete this post?</p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input id="topicID" class="form-control" type="hidden" name="topicID" <?php echo 'value=' .$_GET["topicID"] ?>>
                <input id="threadID" class="form-control" type="hidden" name="threadID" <?php echo 'value=' .$_GET["threadID"] ?>>
                <button type="submit" class="btn btn-danger" name="deletePost">Confirm</button>
                <a href="listThreads.php?topicID=<?php echo $_GET["topicID"]?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
        <?php
    }
} else {
    ?>
    </div class="container mt-3">
    <p>You need to be logged for this</p>
    </div>
    <?php
}
?>
</body>
</html>
