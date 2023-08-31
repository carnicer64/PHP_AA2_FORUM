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
}

$controller = new postController();
$userController = new userController();
if(isset($_GET["threadID"])){
    $posts = $controller->listPosts($_GET["threadID"]);
}