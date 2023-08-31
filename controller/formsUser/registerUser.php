<?php
if(isset($_POST["register"])){
    $message = [];
    $passwordBuffer = "";
    foreach($_POST as $key=>$value){
        //elimina los espacios del principio y final.
        $value = trim($value);
        // si el campo está vacío
        if($value == "") {
            $message[] = '<p class="error-form">El campo <b>' . $key . '</b> no puede estár vacío</p>'; // asigna mensaje de error
            $validation = false;
        }
        if($key == "password"){
            $passwordBuffer = $value;
        }

        if($key == "password2"){
            if($passwordBuffer != $value){
                $message[] = '<p class="error-form">Passwords doesnt match</p>'; // asigna mensaje de error
                $validation = false;
            }
        }
    }// end foreach
    foreach ($message as $fruta) {
        echo $fruta . "<br>";
    }

    if($validation){
        $response = $controller->registerUser($_POST["username"],$_POST["password"],$_POST["name"],$_POST["email"]);
        //Si ya existe el alias o si ocurre un error al ejecutar la consulta vuelve a seccion registrar y muestra el mensaje.
        if(gettype($response) == "string"){
            $_SESSION["formdata"] = $_POST;
            $_SESSION["errorMessage"] = $response;
            echo $response;
        }else{
            $_SESSION["formdata"] = $_POST;
            header("Location:". $_SERVER['PHP_SELF']."?register=correct");
        }
        // si validación es false...
    }else{
        $_SESSION["formdata"] = $_POST; // almacena datos enviados por formulario
        $_SESSION["errorMessage"] = $message; //almacena mensaje de error.
    }// end if validacion. registrar
}// end if(isset($_POST["registrar"]))
