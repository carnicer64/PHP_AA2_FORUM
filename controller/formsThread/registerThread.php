<?php
if (isset($_POST["registerThread"])){
    $message = [];
    $passwordBuffer = "";
    foreach($_POST as $key=>$value){
        //elimina los espacios del principio y final.
        $value = trim($value);
        // si el campo está vacío
        if($value == "") {
            $message[] = '<p class="error-form"> <b>' . $key . '</b> can not be empty</p>'; // asigna mensaje de error
            $validation = false;
        }
    }// end foreach
    foreach ($message as $fruta) {
        echo $fruta . "<br>";
    }

    if($validation){
        $response = $controller->registerThread($_POST["name"],$_POST["message"],$_POST["userID"],$_POST["topicID"]);
        //Si ya existe el alias o si ocurre un error al ejecutar la consulta vuelve a seccion registrar y muestra el mensaje.
        if(gettype($response) == "string"){
            $_SESSION["formdata"] = $_POST;
            $_SESSION["errorMessage"] = $response;
            echo $response;
        }else{
            $_SESSION["formdata"] = $_POST;

            //PUEDE DAR PROBLEMAS
            header("Location:". $_SERVER['PHP_SELF']."?threadRegister=correct&topicID=".$_POST["topicID"]);
        }
        // si validación es false...
    }else{
        $_SESSION["formdata"] = $_POST; // almacena datos enviados por formulario
        $_SESSION["errorMessage"] = $message; //almacena mensaje de error.
    }
}