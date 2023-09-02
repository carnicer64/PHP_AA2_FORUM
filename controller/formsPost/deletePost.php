<?php
if(isset($_POST["deletePost"])){
    $response = $controller->deletePost($_POST["postID"]);
    if(gettype($response) == "string"){
        $_SESSION["formdata"] = $_POST;
        $_SESSION["errorMessage"] = $response;
        echo $response;
    }else{
        $_SESSION["formdata"] = $_POST;
        header("Location:". $_SERVER['PHP_SELF']."?postDelete=correct&threadID=".$_POST["threadID"]);
    }
}// end if(isset($_POST["registrar"]))