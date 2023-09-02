<?php
require_once '../model/post.php';
require_once '../controller/userController.php';

class postController {
    private post $post;

    public function __construct() {
        $this->post = new post(0,"",0,0);
    }

    public function listPosts($threadID) {
        return $this->post->getPostsList($threadID);
    }

    public function registerPost($message, $userID, $threadID){
        return $this->post->newPost($message, $userID, $threadID);
    }

    public function editPost($postID, $message){
        return $this->post->editPost($message, $postID);
    }

    public function deletePost($postID){
        return $this->post->deletePost($postID);
    }
}

$controller = new postController();
$userController = new userController();
if(isset($_POST["registerPost"])){
    $validation = true;
    require_once ("formsPost/registerPost.php");
} else {
    if(isset($_POST["editPost"])){
        $validation = true;
        require_once ("formsPost/editPost.php");
    } else {
        if(isset($_POST["deletePost"])){
            require_once ("formsPost/deletePost.php");
        } else {
            if (isset($_GET["threadID"])) {
                $posts = $controller->listPosts($_GET["threadID"]);
            }
        }
    }
}