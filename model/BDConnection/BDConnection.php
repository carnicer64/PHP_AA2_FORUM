<?php

class BDConnection{

    public static function ConnectBD(){
        try{
            //Este archivo es requerido desde dos ubicaciones. Es por eso que se realizan dos comprobaciones para verificar si el archivo basededatos.php existe
            if(file_exists("../model/BDConnection/bd.php") || file_exists("model/BDConnection/bd.php")){
                // En caso de existir lo solicita
                require_once 'bd.php';
                //instancia objeto PDO
                $conexion = new PDO("mysql:host=".HOST."; dbname=".DBNAME,USER,PASS);
                //Asignación de atributos para detección de errores.
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Codificación para evitar símbolos en carácteres especiales.
                $conexion->exec("SET CHARACTER SET utf8");
                //devuelve objeto Conexion
                return $conexion;
                // en caso de no existir, devuelve un mensaje de error.
            }else{
                return "<p class='warning-form'>No cuenta con los recursos* para conectar con la base de datos. En la página de inicio podrá ver los pasos a seguir para generar los recursos necesarios.<br><small>*Si ya generó los recursos, revise que los datos sean correctos.</small></p>";
            }
            //En caso de exception devuelve el mensaje correspondiente.
        }catch(PDOException $e){
            return self::mensajes($e->getCode());
        }
    }


    public static function mensajes(string $e): string
    {
        switch($e){
            case "2002":
                if(file_exists("modelo/BDConnection/BDConnection.php")){
                    return "<p class='error-form'>Error al conectar!! El host es incorrecto: (" . $e.")</p>";
                }else{
                    return "<p class='warning-form'>No cuenta con los recursos* para conectar con la base de datos. En la página de inicio podrá ver los pasos a seguir para generar los recursos necesarios.<br><small>*Si ya generó los recursos, revise que los datos sean correctos.</small></p>";
                }
                break;
            case "1049":
                return "<p class='error-form'>Error al conectar!! No se encuentra la Base de datos: (" . $e.")</p>";
                break;
            case "1045":
                return "<p class='error-form'>Error al conectar!! Usuario y/o Contraseña incorrecta: (" . $e.")</p>";
                break;
            case "42000":
                return "<p class='error-form'>Error al conectar!! Usuario y/o Contraseña incorrecta: (" . $e.")</p>";
                break;
            case "42S02":
                return "<p class='error-form'>Error en la consulta!! No se encuentra la Tabla en la DDBB: (" . $e.")</p>";
                break;
            case "23000":
                return "<p class='error-form'>Ya existe el usuario. Prueba con otro alias (" . $e.")</p>";
                break;
            default:
                return "<p class='error-form'>Error al conectar!! ERROR INESPERADO ".$e."</p>";
        }//end Switch
    }//end mensajes($e)
}//end Clase